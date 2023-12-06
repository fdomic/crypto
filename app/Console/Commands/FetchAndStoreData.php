<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CryptoController;
use App\Models\Crypto;
use App\Models\CryptoPrice;
use Illuminate\Support\Facades\Http;

class FetchAndStoreData extends Command
{
    protected $signature = 'fetch:store';
    protected $description = 'Fetch and store crypto data';

    protected $cryptoController;

    public function __construct(CryptoController $cryptoController)
    {
        parent::__construct();

        $this->cryptoController = $cryptoController;
    }

    public function handle()
    {
        $this->cryptoController->fetchAndStoreData();

        $this->info('Data fetched and stored successfully.');
    }
}
