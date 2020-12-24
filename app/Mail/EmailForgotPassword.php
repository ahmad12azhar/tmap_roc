<?php

namespace App\Mail;

use App\Models\SiteConfig;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    protected $data, $siteconfig;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->siteconfig = SiteConfig::first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(config('app.name') .' | Forgot Password')
                    ->markdown('emails.forgot_password')
                    ->with(
                        [
                            'data' => $this->data,
                            'siteconfig' => $this->siteconfig
                        ]
                    );
    }
}
