<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Page::updateOrCreate(
            ['slug' => 'terms-of-service'],
            [
                'title' => 'Terms of Service',
                'content' => '<h1>Terms of Service</h1><p>Welcome to San Diego Directory. By using our website, you agree to these terms.</p><h2>1. Acceptance of Terms</h2><p>By accessing and using this service, you accept and agree to be bound by the terms and provision of this agreement.</p><h2>2. Use License</h2><p>Permission is granted to temporarily view the materials on our website for personal, non-commercial transitory viewing only.</p><p>Last Updated: December 2025</p>'
            ]
        );

        \App\Models\Page::updateOrCreate(
            ['slug' => 'privacy-policy'],
            [
                'title' => 'Privacy Policy',
                'content' => '<h1>Privacy Policy</h1><p>Your privacy is important to us. It is San Diego Directory\'s policy to respect your privacy regarding any information we may collect from you across our website.</p><h2>1. Information We Collect</h2><p>We only ask for personal information when we truly need it to provide a service to you.</p><h2>2. Data Retention</h2><p>We only retain collected information for as long as necessary to provide you with your requested service.</p><p>Last Updated: December 2025</p>'
            ]
        );
    }
}
