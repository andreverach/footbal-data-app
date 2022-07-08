<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CompetitionController extends Controller
{  
    public function index()
    {        
        $url = env('API_URL') . 'competitions';
        $competitions = Http::timeout(3)
            ->accept('application/json')
            ->withHeaders([
                'X-Auth-Token' => env('X_TOKEN')
            ])
            ->get($url);
        return json_decode($competitions);
    }

    public function view($competitionId)
    {   //dd()->
        $url = env('API_URL') . 'competitions';
        $competition = Http::timeout(3)
            ->accept('application/json')
            ->withHeaders([
                'X-Auth-Token' => env('X_TOKEN')
            ])
            ->get($url . '/' . $competitionId . '/standings');
        return json_decode($competition);
    }    
}
