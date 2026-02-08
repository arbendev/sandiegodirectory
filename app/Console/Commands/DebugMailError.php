<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Notifications\NewMemberAlert;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Mail\Markdown;
use Illuminate\Container\Container;

class DebugMailError extends Command
{
    protected $signature = 'debug:mail-error';
    protected $description = 'Debug the View [email] not found error';

    public function handle()
    {
        $this->info('Starting debug...');

        try {
            // Mock a user
            $user = new User();
            $user->id = 1;
            $user->name = 'Test User';
            $user->email = 'test@example.com';
            $user->role = 'user';

            $this->info('Creating notification...');
            $notification = new NewMemberAlert($user);
            
            $this->info('Calling toMail...');
            $message = $notification->toMail($user);

            $this->info('MailMessage created.');
            
            $viewName = $message->markdown ?? $message->theme ?? 'notifications::email';
            $this->info("Markdown view to render: " . json_encode($viewName));

            if ($viewName === 'notifications::email') {
                $this->info('View name is correct (default).');
            } else {
                $this->warn('View name IS NOT default!');
            }

            $this->info('Attempting to render...');
            $markdown = Container::getInstance()->make(Markdown::class);
            $html = $markdown->render($viewName, $message->data());
            
            $this->info('Render successful!');
        } catch (\Exception $e) {
            $this->error('Exception caught: ' . $e->getMessage());
            $this->error($e->getTraceAsString());
        }
    }
}
