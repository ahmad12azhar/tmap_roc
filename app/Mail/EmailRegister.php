<?php

namespace App\Mail;

use App\Models\SiteConfig;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailRegister extends Mailable
{
    use Queueable, SerializesModels;
    protected $data, $siteconfig, $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $password)
    {
        $this->data = $data;
        $this->siteconfig = SiteConfig::first();
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(config('app.name') . ' | Welcome To Website')
                    ->markdown('emails.registration')
                    ->with(
                        [
                            'data' => $this->data,
                            'siteconfig' => $this->siteconfig,
                            'password' => $this->password,
                        ]
                    );
    }
}
