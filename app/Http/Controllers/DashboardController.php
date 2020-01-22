<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sessions;

class DashboardController extends Controller
{
    public function index( Request $request)
    {		
    	$api = new PokeApi;
    	$baseUrl = 'https://pokeapi.co/api/v2/pokemon/';

    	$pokemon_json = file_get_contents($baseUrl);
 		$results_array = json_decode($search_json,true);
 		$results_array = array($results_array);
 		// dd($results_array);
 		Log::alert($results_array);
        return view('home');
    }
}
