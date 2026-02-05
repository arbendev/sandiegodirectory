<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ListingImage::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?: 0;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')
            ->whereHas('user', function ($q) {
                $q->whereHas('subscriptions', function ($sub) {
                    $sub->where('type', 'default')
                        ->whereIn('stripe_status', ['active', 'trialing']);
                });
            });
    }
}
