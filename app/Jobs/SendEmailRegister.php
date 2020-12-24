<?php

namespace App\Jobs;

use App\Mail\EmailRegister;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailRegister implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data, $password;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $password)
    {
        $this->data = $data;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->data->email)->send(new EmailRegister($this->data, $this->password));
    }
}
