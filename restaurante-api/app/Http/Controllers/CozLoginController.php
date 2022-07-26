<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CozLoginRequest;

use Illuminate\Support\Facades\Auth;

class CozLoginController extends Controller
{

    public function login(CozLoginRequest $request) {

        $credentials = $request->getCredentials();
        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;
        $cozinheiro = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($cozinheiro);
        return $this->authenticated($request, $cozinheiro);

    }

    protected function authenticated(Request $request, $cozinheiro) {

        return redirect()->intended();

    }

}
