<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PokePHP\PokeApi;
use Log;
use View;
use GuzzleHttp;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Redirect;
use Session;

class SearchController extends Controller
{
	public function index(Request $Request)
	{	
		
			$search_term = $Request['query'];
			$search_term = strtolower($search_term);
			$api = new PokeApi;
			$client = new GuzzleHttp\Client(['base_uri' => 'https://pokeapi.co/api/v2/pokemon/']);
			$Message="Next";
			try{
				
			$res = $client->request('GET',$search_term);
			$res= json_decode($res->getbody(),true);
            			$res = array($res);
	
						return View::make('searchresult')->with('pokemon', $res);
			}
			catch (RequestException $e)
			{
				if($e->hasResponse())
				{	

					if($e->getCode() == 404)
					{
						$Message ="Pokemon Not FOund";
					} 
					Session::flash('message', "Pokemon Not Found");
					return Redirect::back();
				}


			}
	

		
// {"type":"User"...'

// Send an asynchronous request.
		// $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
		// $promise = $client->sendAsync($request)->then(function ($response) {
		// 	echo 'I completed! ' . $response->getBody();
		// });
		// $promise->wait();

	}
}
