<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;
use App\Models\CartaTipo;
use App\utils\Erro;


class CartaController extends Controller
{
    public function index()
    {
        $cartas = Carta::with('tipo')->get();
        return response()->json($cartas);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required',
                'descricao' => 'required',
                'imagem_url' => 'required',
                'quantidade' => 'required|numeric',
                'preco' => 'required|numeric',
                'tipo_id' => 'required|exists:carta_tipos,id',
            ]);

            $carta = Carta::create($request->all());
            return response()->json($carta, 201);
        } catch (\Exception $e) {
            return Erro::tratar($e->getMessage(), $e->getCode());
        }
    }

    public function show(string $id) {
        try {
            $carta = Carta::findOrFail($id);
            return response()->json($carta);
        } catch (\Exception $e) {
            return Erro::tratar($e->getMessage(), $e->getCode());
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nome' => 'required',
                'descricao' => 'required',
                'imagem_url' => 'required',
                'quantidade' => 'required|numeric',
                'preco' => 'required|numeric',
                'tipo_id' => 'required|exists:carta_tipos,id',
            ]);

            $carta = Carta::findOrFail($id);
            $carta->update($request->all());
            return response()->json($carta);
        } catch (\Exception $e) {
            return Erro::tratar($e->getMessage(), $e->getCode());
        }
    }

    public function destroy(string $id)
    {
        try {
            Carta::destroy($id);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return Erro::tratar($e->getMessage(), $e->getCode());
        }
    }
}
