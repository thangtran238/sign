<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APICovidController extends Controller
{
    public function getData() {
        $response = Http::get('https://api.covid19api.com/summary');
        $data = $response->json();

        return view('covidApi', ['data' => $data]);
    }
}
