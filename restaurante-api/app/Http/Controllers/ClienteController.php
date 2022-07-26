<?php

namespace App\Http\Controllers;

use App\Models\Cliente;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function getAllClientes() {

        $clientes = Cliente::get()->toJson(JSON_PRETTY_PRINT);
        return response($clientes, 200);

      }

      public function createCliente(Request $request) {

        $cliente = new Cliente;
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->save();
        return response()->json([
            "message" => "registro do cliente criado"
        ], 201);

      }

      public function getCliente($id) {

        if (Cliente::where('id', $id)->exists()) {
            $cliente = Cliente::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($cliente, 200);
          } else {
            return response()->json([
              "message" => "Cliente não encontrado"
            ], 404);
          }

      }

      public function updateCliente(Request $request, $id) {

        if (Cliente::where('id', $id)->exists()) {
            $cliente = Cliente::find($id);
            $cliente->nome = is_null($request->nome) ? $cliente->nome : $request->nome;
            $cliente->cpf = is_null($request->cpf) ? $cliente->cpf : $request->cpf;
            $cliente->save();
            return response()->json([
                "message" => "registros atualizados com sucesso"
            ], 200);
            } else {
            return response()->json([
                "message" => "Cliente não encontrado"
            ], 404);
        }

      }

      public function deleteCliente ($id) {

        if(Cliente::where('id', $id)->exists()) {
            $cliente = Cliente::find($id);
            $cliente->delete();
            return response()->json([
              "message" => "registros deletados"
            ], 202);
          } else {
            return response()->json([
              "message" => "Cliente não encontrado"
            ], 404);
          }

      }
}
