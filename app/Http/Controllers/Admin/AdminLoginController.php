<?php

namespace estoque\Http\Controllers\Admin;

use Illuminate\Http\Request;
use estoque\Http\Requests;
use estoque\Http\Requests\AdminLoginRequest;
use estoque\Http\Controllers\Controller;

use Input, Validator, Redirect, Closure;
use Auth;
use Session;
use estoque\Http\Middleware\Authenticate;

class AdminLoginController extends Controller
{	

	public function index()
	{
		return view('admin.auth.login');
	}

    public function auth(AdminLoginRequest $request)
    {
        if (\Auth::attempt(['email'=> $request['email'], 'password' => $request['password']])) 
        {
        	return redirect('admin/painel');
        }

        $request->session()->flash('alert-danger', 'E-mail ou Senha incorretos, por favor verifique!');
        return redirect('admin/login/');
    }

    public function logout()
    {
    	\Auth::logout();
    	return redirect()->guest('admin/login/');
    }
}
