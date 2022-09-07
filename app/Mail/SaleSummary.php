<?php

namespace App\Mail;

use App\Models\Client;
use App\Models\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SaleSummary extends Mailable
{
    use Queueable, SerializesModels;

    public $sale;
    public $client;

    public function __construct(Sale $sale, Client $client)
    {
        $this->sale = $sale;
        $this->client = $client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sale-summary');
    }
}
