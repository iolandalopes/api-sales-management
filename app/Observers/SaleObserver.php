<?php

namespace App\Observers;

use App\Mail\SaleSummary;
use App\Models\Client;
use App\Models\Sale;
use Illuminate\Support\Facades\Mail;

class SaleObserver
{
    public function created(Sale $sale): void
    {
        $client = Client::find($sale->clientId);
        Mail::to($client)->send(new SaleSummary($sale, $client));
    }
}
