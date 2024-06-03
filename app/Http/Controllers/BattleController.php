<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BattleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("app");
    }

    public function battle(Request $request)
    {
        $dados = $request->except('_token');

        $pokemon_1 = $dados['pokemon_1'];
        $pokemon_1_response = Http::get("https://pokeapi.co/api/v2/pokemon/{$pokemon_1}");

        if(!$pokemon_1_response->successful()){
            return view("app", [
                "error" => "$pokemon_1 não foi encontrado"
            ]);
        }

        $pokemon_1 = $pokemon_1_response->json();

        $pokemon_2 = $dados['pokemon_2'];
        $pokemon_2_response = Http::get("https://pokeapi.co/api/v2/pokemon/{$pokemon_2}");

        if(!$pokemon_2_response->successful()){
            return view("app", [
                "error" => "$pokemon_2 não foi encontrado"
            ]);
        }

        $pokemon_2 = $pokemon_2_response->json();

        $pokemon_1_att = $pokemon_1['stats'][1]['base_stat'];
        $pokemon_2_att = $pokemon_2['stats'][1]['base_stat'];

        if($pokemon_1_att > $pokemon_2_att){
            return view("app", [
                'winner' => $pokemon_1
            ]);
        }

        if($pokemon_2_att > $pokemon_1_att){
            return view("app", [
                'winner' => $pokemon_2
            ]);
        }
        
        return view("app", [
            'empate' => true
        ]);
    }
}
