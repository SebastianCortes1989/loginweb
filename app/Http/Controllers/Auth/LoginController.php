<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth, Hash;

use App\Http\Requests\Login\LoginFormRequest;

class LoginController extends Controller
{
    /*
     * loguear usuario
     *
     * return Response
    */
    public function index(){
        return view('login.index');
    }

    /*
     * autenticar usuario
     *
     * return Response
    */
    public function authenticate(LoginFormRequest $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('admin/clientes');
        }

        return redirect()->back();
    } 
}
