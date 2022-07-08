<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class PlayerController extends Controller
{
    public function view($playerId)
    {
        $url = env('API_URL') . 'persons';
        $player = Http::timeout(3)
            ->accept('application/json')    
            ->withHeaders([
                'X-Auth-Token' => env('X_TOKEN')
            ])
            ->get($url . '/' . $playerId);
        Session::push('players', json_decode($player));
        if(Session::has('players')){
            return response()->json([
                'status' => true,
                'data' => Session::get('players')
            ]);
        }else{
            return response()->json([
                'message' => 'No se pudo seleccionar este jugador!',
                'status' => false
            ]);
        }
    }

    public function index(){
        return Session::get('players');
        if(Session::has('players')){
            return response()->json([
                'status' => true,
                'data' => Session::get('players')
            ]);
        }else{
            return response()->json([
                'message' => 'Aún no has seleccionado jugadores para tu equipo!',
                'status' => false
            ]);
        }
    }    
}
