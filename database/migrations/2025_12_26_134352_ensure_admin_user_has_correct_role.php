<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update the specific admin user to have the 'admin' role
        DB::table('users')
            ->where('email', 'admin@sddirectory.com')
            ->update(['role' => 'admin']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optional: Revert the role change if needed, though usually not necessary for data fixes
    }
};
