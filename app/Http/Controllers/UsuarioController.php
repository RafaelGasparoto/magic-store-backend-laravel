<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utils\Erro;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        try {
            $usuarios = Usuario::all();
            return response()->json($usuarios);
        } catch (\Exception $e) {
            return Erro::tratar($e->getMessage(), $e->getCode());
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required',
            ]);

            $usuario = Usuario::create($request->all());
            return response()->json($usuario, 201);
        } catch (\Exception $e) {
            return Erro::tratar($e->getMessage(), $e->getCode());
        }
    }

    public function show(string $id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            return response()->json($usuario);
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
            Usuario::destroy($id);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return Erro::tratar($e->getMessage(), $e->getCode());
        }
    }
}
