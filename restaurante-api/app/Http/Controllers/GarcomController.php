<?php

namespace App\Http\Controllers;

use App\Models\Garcom;
use Illuminate\Http\Request;

class GarcomController extends Controller
{

    public function getAllGarcoms()
    {

        $garcoms = Garcom::get()->toJson(JSON_PRETTY_PRINT);
        return response($garcoms, 200);

    }

    public function createGarcom(Request $request)
    {

        $garcom = new Garcom;
        $garcom->nome = $request->nome;
        $garcom->apelido = $request->apelido;
        $garcom->email = $request->email;
        $garcom->password = $request->password;
        $garcom->save();
        return response()->json([
            "message" => "registro do garcom criado",
        ], 201);

    }

    public function getGarcom($id)
    {

        if (Garcom::where('id', $id)->exists()) {
            $garcom = Garcom::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($garcom, 200);
        } else {
            return response()->json([
                "message" => "Garcom não encontrado",
            ], 404);
        }

    }

    public function updateGarcom(Request $request, $id)
    {

        if (Garcom::where('id', $id)->exists()) {
            $garcom = Garcom::find($id);
            $garcom->nome = is_null($request->nome) ? $garcom->nome : $request->nome;
            $garcom->apelido = is_null($request->apelido) ? $garcom->apelido : $request->apelido;
            $garcom->email = is_null($request->email) ? $garcom->email : $request->email;
            $garcom->password = is_null($request->password) ? $garcom->password : $request->password;
            $garcom->save();
            return response()->json([
                "message" => "registros atualizados com sucesso",
            ], 200);
        } else {
            return response()->json([
                "message" => "Garcom não encontrado",
            ], 404);
        }

    }

    public function deleteGarcom($id)
    {

        if (Garcom::where('id', $id)->exists()) {
            $garcom = Garcom::find($id);
            $garcom->delete();
            return response()->json([
                "message" => "registros deletados",
            ], 202);
        } else {
            return response()->json([
                "message" => "Garcom não encontrado",
            ], 404);
        }

    }

}

