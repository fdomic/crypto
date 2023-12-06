<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptoController;

Route::get('/fetch-and-store', [CryptoController::class, 'fetchAndStoreData']);
Route::get('/top-cryptos-api', [CryptoController::class, 'getTopCryptosByPriceApi']);
Route::get('/top-cryptos-web', [CryptoController::class, 'getTopCryptosByPriceWeb'])->name('topCryptos');
Route::get('/crypto/edit/{id}', [CryptoController::class, 'editCrypto'])->name('editCrypto');
Route::put('/crypto/update/{id}', [CryptoController::class, 'updateCrypto'])->name('updateCrypto');

