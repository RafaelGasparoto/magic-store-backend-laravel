<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Pedido;

class CarrinhoController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'carta_id' => 'required|exists:cartas,id',
            'quantidade' => 'required|numeric',
        ]);

        $usuario_id = 1;

        if (!Carrinho::where('usuario_id', $usuario_id)->exists()) {
            $carrinho = Carrinho::create([
                'usuario_id' => $usuario_id,
                'total' => 0
            ]);
        } else {
            $carrinho = Carrinho::where('usuario_id', $usuario_id)->first();
        }

        $item = $carrinho->items()->where('carta_id', $request->input('carta_id'))->first();

        if ($item) {
            $item->quantidade = $request->input('quantidade');
            $item->preco = $request->input('preco');

            $items = $carrinho->items()->with('carta')->get();
            $total = $items->sum(function ($item) {
                return $item->quantidade * $item->preco;
            });

            $item->save();
        } else {
            $carrinho->items()->create([
                'carta_id' => $request->input('carta_id'),
                'quantidade' => $request->input('quantidade'),
                'preco' => $request->input('preco'),
                'total' => $request->input('preco') * $request->input('quantidade'),
            ]);
        }

        return redirect()->route('home');
    }

    public function show()
    {

        $usuario_id = 1;

        try {
            $carrinho = Carrinho::where('usuario_id', $usuario_id)->with('items')->firstOrFail();

            $items = $carrinho->items()->with('carta')->get();

            $total = $items->sum(function ($item) {
                return $item->quantidade * $item->preco;
            });
            return view('carrinho', compact('items', 'total'));
        } catch (\Throwable $th) {
            return view('carrinho');
        }
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
