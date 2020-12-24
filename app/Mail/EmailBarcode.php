<?php

namespace App\Mail;

use App\Models\SiteConfig;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailBarcode extends Mailable
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
        return $this->subject('MLJ | Barcode')
                    ->markdown('emails.barcode')
                    ->with(
                        [
                            'data' => $this->data,
                            'siteconfig' => $this->siteconfig,
                        ]
                    );
    }
}
