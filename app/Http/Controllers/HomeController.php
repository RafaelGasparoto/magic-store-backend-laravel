<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;
use App\Models\ItemCarrinho;

class HomeController extends Controller
{
    public function index()
    {
        $cartas = Carta::with('tipo')->get();

        $itemsCarrinho = ItemCarrinho::with('carta')->get();

        foreach ($cartas as $carta) {
            $carta->quantidade = $itemsCarrinho->where('carta_id', $carta->id)->first()->quantidade ?? 0;
        }

        return view('home', compact('cartas'));
    }
}
