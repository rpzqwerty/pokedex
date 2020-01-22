<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PokePHP\PokeApi;
use Log;
use View;
use GuzzleHttp;
use Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // dd($request->session());

        $api = new PokeApi;
        $pokemon_today = rand(1,807);
        // $baseUrl = 'https://pokeapi.co/api/v2/pokemon/'.$pokemon_today;
        $client = new GuzzleHttp\Client();

        $res = $client->request('GET', 'https://pokeapi.co/api/v2/pokemon/'. urlencode($pokemon_today));
            // echo $res->getStatusCode();
            // "200"
            // echo $res->getHeader('content-type')[0];
            // // 'application/json; charset=utf8'
            // echo $res->getBody();
            $res= json_decode($res->getbody(),true);
            $res = array($res);


            return View::make('home')->with('pokemon', $res);
        // $pokemon_json = file_get_contents($baseUrl);
        // $pokemon_array = json_decode($pokemon_json,true);
        // $pokemon_array = array($pokemon_array);
        // Log::alert($pokemon_array);
        // return View::make('home')->with('pokemon', $pokemon_array);
        
    }
}
