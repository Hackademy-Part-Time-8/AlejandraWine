<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $endpoint = 'https://api.chucknorris.io/jokes/random';
        try{
            $response = Http::withoutVerifying()->get($endpoint,[]);
            $json = $response->json();
            $quote = $json['value'];

        }catch(Exception $e){

            return view('home');

        }

        return view('home',compact('quote'));
    }
}
