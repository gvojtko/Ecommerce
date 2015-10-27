<?php

namespace estoque\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;
use Auth;
use estoque\Http\Requests\AdminLoginRequest;
use \Illuminate\Http\Request;

class AdminAuthenticate
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

       if (!$this->auth->check() AND !$request->is('/adin/login')) {
            $request->session()->flash('alert-danger', 'Você precisa estar logado para acessar este conteúdo!');
            return redirect('/admin/login');
        }

        return $next($request);
       
    }
}
