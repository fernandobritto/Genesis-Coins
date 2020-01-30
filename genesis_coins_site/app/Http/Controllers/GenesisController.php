<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class GenesisController extends Controller
{
    public function start(){
        return view('index');
    }

    public function coins()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://www.mercadobitcoin.net/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $coin = 'BTC/';

        $response = $client->request('GET', $coin.'ticker');


        $coins = json_decode($response->getBody()->getContents());

        return view('test/home', compact('coins'));

    }
}
