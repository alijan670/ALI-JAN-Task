<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\UpdateStockFromWooCommerce;

class UpdateStockFromWooCommerceCommand extends Command
{
    protected $signature = 'stock:update-from-woocommerce';
    protected $description = 'Syncs stock levels from WooCommerce to Laravel';

    public function handle()
    {
        // Dispatch the job to update stock levels
        UpdateStockFromWooCommerce::dispatch();
        $this->info('Stock levels updated from WooCommerce successfully.');
    }
}
