<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    public function getAllMesas()
    {

        $mesas = Mesa::get()->toJson(JSON_PRETTY_PRINT);
        return response($mesas, 200);

    }

    public function createMesa(Request $request)
    {

        $mesa = new Mesa;
        $mesa->numero = $request->numero;
        $mesa->save();
        return response()->json([
            "message" => "registro da mesa criada",
        ], 201);

    }

    public function getMesa($id)
    {

        if (Mesa::where('id', $id)->exists()) {
            $mesa = Mesa::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($mesa, 200);
        } else {
            return response()->json([
                "message" => "Mesa não encontrada",
            ], 404);
        }

    }

    public function updateMesa(Request $request, $id)
    {

        if (mesa::where('id', $id)->exists()) {
            $mesa = mesa::find($id);
            $mesa->numero = is_null($request->numero) ? $mesa->numero : $request->numero;
            $mesa->save();
            return response()->json([
                "message" => "registros atualizados com sucesso",
            ], 200);
        } else {
            return response()->json([
                "message" => "Mesa não encontrada",
            ], 404);
        }

    }

    public function deleteMesa($id)
    {

        if (Mesa::where('id', $id)->exists()) {
            $mesa = Mesa::find($id);
            $mesa->delete();
            return response()->json([
                "message" => "registros deletados",
            ], 202);
        } else {
            return response()->json([
                "message" => "Mesa não encontrada",
            ], 404);
        }

    }
}
