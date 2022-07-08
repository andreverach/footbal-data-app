<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeamController extends Controller
{
    public function index()
    {
        $url = env('API_URL') . 'teams';
        $teams = Http::timeout(3)
            ->accept('application/json')
            ->withHeaders([
                'X-Auth-Token' => env('X_TOKEN')
            ])
            ->get($url);
        return json_decode($teams);
    }

    public function view($teamId)
    {        
        $url = env('API_URL') . 'teams';
        $team = Http::timeout(3)
            ->accept('application/json')    
            ->withHeaders([
                'X-Auth-Token' => env('X_TOKEN')
            ])
            ->get($url . '/' . $teamId);
        return json_decode($team);
    }   
}
