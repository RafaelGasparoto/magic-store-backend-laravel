<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\ItemCarrinho;

class ItemCarrinhoController extends Controller
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

        $carrinho = Carrinho::findOrFail($request->input('carrinho_id'));

        $carrinho->items()->create([
            'carta_id' => $request->input('carta_id'),
            'quantidade' => $request->input('quantidade'),
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ItemCarrinho::destroy($id);
        return redirect()->route('carrinho.show');
    }
}
