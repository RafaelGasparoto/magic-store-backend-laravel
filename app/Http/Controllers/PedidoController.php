<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utils\Erro;
use App\Models\Pedido;

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

    public function store(Request $request)
    {
        try {
            $request->validate([
                'usuario_id' => 'required|exists:usuarios,id',
                'items' => 'required|array',
            ]);

            $request->request->add(['quantidade_itens' => count($request->input('items'))]);

            $total = 0;
            foreach ($request->input('items') as $item) {
                $total += $item['quantidade'] * $item['preco'];
            }

            $request->request->add(['total' => $total]);

            $pedido = Pedido::create($request->all());

            foreach ($request->input('items') as $item) {
                $pedido->items()->create([
                    'carta_id' => $item['carta_id'],
                    'quantidade' => $item['quantidade'],
                    'preco' => $item['preco'],
                ]);
            }

            return response()->json($pedido, 201);
        } catch (\Exception $e) {
            return Erro::tratar($e->getMessage(), $e->getCode());
        }
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
