<?php

namespace App\Jobs;

use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateStockFromWooCommerce implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $client = new Client();

        $response = $client->request('GET', env('WOOCOMMERCE_STORE_URL') . '/wp-json/wc/v3/products', [
            'auth' => [env('WOOCOMMERCE_CONSUMER_KEY'), env('WOOCOMMERCE_CONSUMER_SECRET')],
        ]);

        $products = json_decode($response->getBody(), true);

        foreach ($products as $wooProduct) {
            // Update stock levels in Laravel database
            Product::updateOrCreate(
                ['name' => $wooProduct['name']],
                ['quantity' => $wooProduct['stock_quantity']]
            );
        }
    }
}
