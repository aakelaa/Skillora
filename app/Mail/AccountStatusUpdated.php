<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Markdown;
use Illuminate\Queue\SerializesModels;

class AccountStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public string $status;

    public function __construct(User $user, string $status)
    {
        $this->user = $user;
        $this->status = $status;
    }

    public function build(): static
    {
        return $this->subject('Your account status has been updated')
            ->view('emails.account-status-updated')
            ->with([
                'user' => $this->user,
                'status' => $this->status,
            ]);
    }
}
