<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CozLogoutController extends Controller
{

    public function perform()
    {

        Session::flush();

        Auth::logout();

        return redirect('login');

    }

}

