<?php

namespace App\Http\Controllers;

use App\Models\Cozinheiro;
use Illuminate\Http\Request;

class CozinheiroController extends Controller
{

    public function getAllCozinheiros()
    {

        $cozinheiros = Cozinheiro::get()->toJson(JSON_PRETTY_PRINT);
        return response($cozinheiros, 200);

    }

    public function createCozinheiro(Request $request)
    {

        $cozinheiro = new Cozinheiro;
        $cozinheiro->nome = $request->nome;
        $cozinheiro->apelido = $request->apelido;
        $cozinheiro->email = $request->email;
        $cozinheiro->password = $request->password;
        $cozinheiro->save();
        return response()->json([
            "message" => "registro do cozinheiro criado",
        ], 201);

    }

    public function getCozinheiro($id)
    {

        if (Cozinheiro::where('id', $id)->exists()) {
            $cozinheiro = Cozinheiro::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($cozinheiro, 200);
        } else {
            return response()->json([
                "message" => "Cozinheiro não encontrado",
            ], 404);
        }

    }

    public function updateCozinheiro(Request $request, $id)
    {

        if (Cozinheiro::where('id', $id)->exists()) {
            $cozinheiro = Cozinheiro::find($id);
            $cozinheiro->nome = is_null($request->nome) ? $cozinheiro->nome : $request->nome;
            $cozinheiro->apelido = is_null($request->apelido) ? $cozinheiro->apelido : $request->apelido;
            $cozinheiro->email = is_null($request->email) ? $cozinheiro->email : $request->email;
            $cozinheiro->password = is_null($request->password) ? $cozinheiro->password : $request->password;
            $cozinheiro->save();
            return response()->json([
                "message" => "registros atualizados com sucesso",
            ], 200);
        } else {
            return response()->json([
                "message" => "Cozinheiro não encontrado",
            ], 404);
        }

    }

    public function deleteCozinheiro($id)
    {

        if (Cozinheiro::where('id', $id)->exists()) {
            $cozinheiro = Cozinheiro::find($id);
            $cozinheiro->delete();
            return response()->json([
                "message" => "registros deletados",
            ], 202);
        } else {
            return response()->json([
                "message" => "Cozinheiro não encontrado",
            ], 404);
        }

    }

}
