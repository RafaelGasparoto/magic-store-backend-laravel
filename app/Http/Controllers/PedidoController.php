<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utils\Erro;
use App\Models\Pedido;
use App\Models\Carrinho;

class PedidoController extends Controller
{
    public function index()
    {
        try {
            $pedidos = Pedido::with('items')->get();
            return response()->json($pedidos);
        } catch (\Exception $e) {
            return Erro::tratar($e->getMessage(), $e->getCode());
        }
    }

    public function comprar(Request $request)
    {
        $usuario_id = 1;

        $carrinho = Carrinho::where('usuario_id', $usuario_id)->with('items')->firstOrFail();
        $total = $carrinho->items->sum(function ($item) {
            return $item->quantidade * $item->preco;
        });

        $forma_pagamento = $request->input('forma_pagamento');

        $pedido = Pedido::create([
            'usuario_id' => $usuario_id,
            'total' => $total,
            'forma_pagamento' => $forma_pagamento,
            'quantidade_itens' => $carrinho->items->count(),
        ]);

        foreach ($carrinho->items as $item) {
            $pedido->items()->create([
                'carta_id' => $item->carta_id,
                'quantidade' => $item->quantidade,
                'preco' => $item->preco,
            ]);
        }

        $carrinho->items()->delete();
        $carrinho->delete();

        return redirect()->route('home');
    }

    public function show(string $id)
    {
        try {
            $pedido = Pedido::with('items')->findOrFail($id);
            return response()->json($pedido);
        } catch (\Exception $e) {
            return Erro::tratar($e->getMessage(), $e->getCode());
        }
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        try {
            Pedido::destroy($id);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return Erro::tratar($e->getMessage(), $e->getCode());
        }
    }
}
