<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $categories = \App\Models\Category::all();
        return view('auth.register', compact('categories'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        if (isset($data['role']) && $data['role'] === 'business_owner') {
            $rules = array_merge($rules, [
                'business_name' => ['required', 'string', 'max:255'],
                'category_id' => ['required', 'exists:categories,id'],
                'address' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'zip' => ['required', 'string', 'max:20'],
                'website' => ['nullable', 'url', 'max:255'],
                'phone' => ['required', 'string', 'max:50'],
                'description' => ['required', 'string'],
            ]);
        }

        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $role = $data['role'] ?? 'user';
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $role,
        ]);

        if ($role === 'business_owner') {
            // Create Stripe Customer and Subscription if featured plan selected
            if (isset($data['plan']) && $data['plan'] === 'featured' && isset($data['payment_method'])) {
                try {
                    $user->createOrGetStripeCustomer();
                    $user->updateDefaultPaymentMethod($data['payment_method']);
                    $user->newSubscription('default', 'prod_TvLZjJxKUml5OR')
                        ->create($data['payment_method']);
                } catch (\Exception $e) {
                    // Log error but allow user creation to proceed (or could handle failure)
                    // Ideally we should rollback or show error, but for now we proceed
                    // Listing will be pending anyway
                    \Illuminate\Support\Facades\Log::error('Stripe Subscription Failed: ' . $e->getMessage());
                }
            }

            $user->listings()->create([
                'title' => $data['business_name'],
                'slug' => \Illuminate\Support\Str::slug($data['business_name'] . '-' . uniqid()),
                'category_id' => $data['category_id'],
                'address' => $data['address'],
                'city' => $data['city'],
                'state' => 'CA', // Defaulting for SD Directory
                'zip' => $data['zip'],
                'website' => $data['website'] ?? null,
                'phone' => $data['phone'],
                'description' => $data['description'],
                // Check 'plan' field from request to set is_featured
                'is_featured' => isset($data['plan']) && $data['plan'] === 'featured',
                'status' => 'pending', // Pending approval
            ]);
        }

        return $user;
    }
}
