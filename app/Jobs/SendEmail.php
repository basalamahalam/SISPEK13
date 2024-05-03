<?php

namespace App\Jobs;

use App\Mail\Pendaftarans;
use App\Models\Pendaftaran;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $pendaftarEmail;

    /**
     * Create a new job instance.
     */
    public function __construct($pendaftarEmail)
    {
        $this->pendaftarEmail = $pendaftarEmail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->pendaftarEmail)->send(new Pendaftarans($this->pendaftarEmail));
    }
}
