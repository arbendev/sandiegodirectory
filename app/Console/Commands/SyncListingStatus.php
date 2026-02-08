<?php

namespace App\Console\Commands;

use App\Models\Listing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SyncListingStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'listings:sync-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync listing status based on user subscription status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $listings = Listing::with('user')->get();
        $updatedCount = 0;

        foreach ($listings as $listing) {
            // Skip listings that are manually managed by the admin
            if ($listing->is_manual) {
                continue;
            }

            $user = $listing->user;
            
            // Check subscription status
            // Laravel Cashier subscribed() returns true if the user has an active or trialing subscription.
            $isSubscribed = $user && $user->subscribed('default');
            
            $currentStatus = $listing->status;
            $newStatus = $currentStatus;

            if ($isSubscribed && $currentStatus === 'suspended') {
                $newStatus = 'active';
            } elseif (!$isSubscribed && $currentStatus === 'active') {
                $newStatus = 'suspended';
            }

            if ($newStatus !== $currentStatus) {
                $listing->status = $newStatus;
                $listing->save();
                $updatedCount++;
                
                $this->info("Updated listing #{$listing->id} ({$listing->title}) status: {$currentStatus} -> {$newStatus}");
                Log::info("Listing #{$listing->id} status synced: {$currentStatus} -> {$newStatus}");
            }
        }

        $this->info("Sync complete. Updated {$updatedCount} listings.");
    }
}
