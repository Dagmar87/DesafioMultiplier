<?php

namespace App\Http\Controllers;

use App\Http\Requests\GarLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GarLoginController extends Controller
{

    public function login(GarLoginRequest $request)
    {

        $credentials = $request->getCredentials();
        if (!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;
        $garcom = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($garcom);
        return $this->authenticated($request, $garcom);

    }

    protected function authenticated(Request $request, $garcom)
    {

        return redirect()->intended();

    }

}

