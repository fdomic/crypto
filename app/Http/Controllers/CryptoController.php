<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use App\Models\CryptoPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CryptoController extends Controller
{
    public function fetchAndStoreData()
    {
        $response = Http::get('https://api.coinpaprika.com/v1/tickers');
        $data = $response->json();

        foreach ($data as $cryptoData) {
            $crypto = Crypto::updateOrCreate(['name' => $cryptoData['name']]);

            if($crypto->edited) continue;

            CryptoPrice::create([
                'crypto_id' => $crypto->id,
                'price' => $cryptoData['quotes']['USD']['price'],
                'percent_change_15m' => $cryptoData['quotes']['USD']['percent_change_15m'],
            ]);
        }

        return response()->json(['message' => 'Podaci su uspjesno spremljeni.']);
    }

    public function getTopCryptosByPriceApi()
    {
        $topCryptos = Crypto::latestPrice()->orderByDesc('crypto_prices.percent_change_15m')->take(10)->get();

        return response()->json($topCryptos);
    }

    public function getTopCryptosByPriceWeb()
    {
        $topCryptos = Crypto::latestPrice()->orderByDesc('crypto_prices.percent_change_15m')->take(10)->get();

        return view('topCryptos', ['topCryptos' => $topCryptos]);
    }

    public function editCrypto($id)
    {
        $crypto = Crypto::findOrFail($id);
        $crypto_price = CryptoPrice::where('crypto_id',$crypto->id)->orderByDesc('id')->first();

        return view('editCrypto', ['price' => $crypto_price->price, 'id' => $crypto->id]);
    }

    public function updateCrypto(Request $request, $id)
    {
        $crypto = Crypto::findOrFail($id);
        $crypto_price = CryptoPrice::where('crypto_id',$crypto->id)->orderByDesc('id')->first();

        $crypto->update([
            'edited' => true,
        ]);

        $priceOld = $crypto_price->price;
        $priceNew = floatval($request->input('price'));
        $change = ($priceNew-$priceOld) / $priceOld *100;

        CryptoPrice::create([
            'crypto_id' => $crypto->id,
            'price' => $request->input('price'),
            'percent_change_15m' => $change,
        ]);

        return redirect()->route('topCryptos')->with('success', 'new Crypto price create successfully');
    }
}
