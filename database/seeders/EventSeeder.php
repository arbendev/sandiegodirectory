<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create();

        $events = [
            [
                'title' => 'Sunset Yoga at the Park',
                'description' => 'Join us for a relaxing evening of yoga as the sun sets over Balboa Park. Open to all levels.',
                'location_name' => 'Balboa Park',
                'address' => '1549 El Prado, San Diego, CA 92101',
                'price_type' => 'free',
                'price' => null,
                'start_datetime' => Carbon::now()->addDays(2)->setHour(18)->setMinute(0),
                'end_datetime' => Carbon::now()->addDays(2)->setHour(19)->setMinute(30),
            ],
            [
                'title' => 'Downtown Food Tour',
                'description' => 'Taste the best flavors of San Diego on this guided walking tour of the Gaslamp Quarter.',
                'location_name' => 'Gaslamp Quarter',
                'address' => 'Gaslamp Quarter, San Diego, CA',
                'price_type' => 'paid',
                'price' => 45.00,
                'start_datetime' => Carbon::now()->addDays(5)->setHour(11)->setMinute(0),
                'end_datetime' => Carbon::now()->addDays(5)->setHour(14)->setMinute(0),
            ],
            [
                'title' => 'Tech Networking Mixer',
                'description' => 'Connect with local tech professionals, developers, and entrepreneurs.',
                'location_name' => 'WeWork B Street',
                'address' => '600 B St, San Diego, CA 92101',
                'price_type' => 'free',
                'price' => null,
                'start_datetime' => Carbon::now()->addWeek()->setHour(17)->setMinute(30),
                'end_datetime' => Carbon::now()->addWeek()->setHour(20)->setMinute(0),
            ],
            [
                'title' => 'Live Jazz Night',
                'description' => 'Enjoy smooth jazz performances by local artists while sipping on craft cocktails.',
                'location_name' => 'The Shout House',
                'address' => '655 Fourth Ave, San Diego, CA 92101',
                'price_type' => 'paid',
                'price' => 20.00,
                'start_datetime' => Carbon::now()->addDays(10)->setHour(20)->setMinute(0),
                'end_datetime' => Carbon::now()->addDays(10)->setHour(23)->setMinute(0),
            ],
            [
                'title' => 'Beach Cleanup Drive',
                'description' => 'Help keep our beaches clean! supplies provided.',
                'location_name' => 'Pacific Beach',
                'address' => 'Pacific Beach, San Diego, CA',
                'price_type' => 'free',
                'price' => null,
                'start_datetime' => Carbon::now()->addWeeks(2)->setHour(9)->setMinute(0),
                'end_datetime' => Carbon::now()->addWeeks(2)->setHour(12)->setMinute(0),
            ],
        ];

        foreach ($events as $eventData) {
            Event::create(array_merge($eventData, [
                'user_id' => $user->id,
                'listing_id' => null,
                'slug' => Str::slug($eventData['title']) . '-' . Str::random(6),
                'image_path' => null, 
                'tags' => ['San Diego', 'Community'],
            ]));
        }
    }
}
