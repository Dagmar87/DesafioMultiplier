<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{

    public function getAllPedidos()
    {

        $pedidos = Pedido::get()->toJson(JSON_PRETTY_PRINT);
        return response($pedidos, 200);

    }

    public function createPedido(Request $request)
    {

        $pedido = new Pedido;
        $pedido->cliente_id = $request->cliente_id;
        $pedido->mesa_id = $request->mesa_id;
        $pedido->cardapio_id = $request->cardapio_id;
        $pedido->status = $request->status;
        $pedido->dataDoPedido = $request->dataDoPedido;
        $pedido->save();
        return response()->json([
            "message" => "registro do pedido criado",
        ], 201);

    }

    public function getPedido($id)
    {

        if (Pedido::where('id', $id)->exists()) {
            $pedido = Pedido::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($pedido, 200);
        } else {
            return response()->json([
                "message" => "Pedido não encontrado",
            ], 404);
        }

    }

    public function updatePedido(Request $request, $id)
    {

        if (Pedido::where('id', $id)->exists()) {
            $pedido = Pedido::find($id);
            $pedido->cliente_id = is_null($request->cliente_id) ? $pedido->cliente_id : $request->cliente_id;
            $pedido->mesa_id = is_null($request->mesa_id) ? $pedido->mesa_id : $request->mesa_id;
            $pedido->cardapio_id = is_null($request->cardapio_id) ? $pedido->cardapio_id : $request->cardapio_id;
            $pedido->status = is_null($request->status) ? $pedido->status : $request->status;
            $pedido->dataDoPedido = is_null($request->dataDoPedido) ? $pedido->dataDoPedido : $request->dataDoPedido;
            $pedido->save();
            return response()->json([
                "message" => "registros atualizados com sucesso",
            ], 200);
        } else {
            return response()->json([
                "message" => "Pedido não encontrado",
            ], 404);
        }

    }

    public function deletePedido($id)
    {

        if (Pedido::where('id', $id)->exists()) {
            $pedido = Pedido::find($id);
            $pedido->delete();
            return response()->json([
                "message" => "registros deletados",
            ], 202);
        } else {
            return response()->json([
                "message" => "Pedido não encontrado",
            ], 404);
        }

    }

    public function getPedidoByData($dataDoPedido)
    {

        if (Pedido::where('dataDoPedido', $dataDoPedido)->exists()) {
            $pedido = Pedido::where('dataDoPedido', $dataDoPedido)->get()->toJson(JSON_PRETTY_PRINT);
            return response($pedido, 200);
        } else {
            return response()->json([
                "message" => "Pedido não encontrado",
            ], 404);
        }

    }

    public function getPedidoByMesa($mesa_id)
    {

        if (Pedido::where('mesa_id', $mesa_id)->exists()) {
            $pedido = Pedido::where('mesa_id', $mesa_id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($pedido, 200);
        } else {
            return response()->json([
                "message" => "Pedido não encontrado",
            ], 404);
        }

    }

    public function getPedidoByCliente($cliente_id)
    {

        if (Pedido::where('cliente_id', $cliente_id)->exists()) {
            $pedido = Pedido::where('cliente_id', $cliente_id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($pedido, 200);
        } else {
            return response()->json([
                "message" => "Pedido não encontrado",
            ], 404);
        }

    }

}

