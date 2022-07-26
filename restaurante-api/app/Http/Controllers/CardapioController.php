<?php

namespace App\Http\Controllers;

use App\Models\Cardapio;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function getAllItens()
    {

        $cardapios = Cardapio::get()->toJson(JSON_PRETTY_PRINT);
        return response($cardapios, 200);

    }

    public function createItem(Request $request)
    {

        $cardapio = new Cardapio;
        $cardapio->item = $request->item;
        $cardapio->save();
        return response()->json([
            "message" => "registro do item do cardapio criado",
        ], 201);

    }

    public function getItem($id)
    {

        if (Cardapio::where('id', $id)->exists()) {
            $cardapio = Cardapio::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($cardapio, 200);
        } else {
            return response()->json([
                "message" => "Item do Cardapio não encontrado",
            ], 404);
        }

    }

    public function updateItem(Request $request, $id)
    {

        if (Cardapio::where('id', $id)->exists()) {
            $cardapio = Cardapio::find($id);
            $cardapio->item = is_null($request->item) ? $cardapio->item : $request->item;
            $cardapio->save();
            return response()->json([
                "message" => "registros atualizados com sucesso",
            ], 200);
        } else {
            return response()->json([
                "message" => "Item do Cardapio não encontrado",
            ], 404);
        }

    }

    public function deleteItem($id)
    {

        if (Cardapio::where('id', $id)->exists()) {
            $cardapio = Cardapio::find($id);
            $cardapio->delete();
            return response()->json([
                "message" => "registros deletados",
            ], 202);
        } else {
            return response()->json([
                "message" => "Item do Cardapio não encontrado",
            ], 404);
        }

    }
}
