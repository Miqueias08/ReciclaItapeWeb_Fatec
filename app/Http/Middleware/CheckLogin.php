<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Route;
use Auth;
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /*file_put_contents(__DIR__.'/teste.txt',json_encode($rota));*/   
        $rota = request()->route()->uri; 
        switch ($rota) {
            case 'administrador/login':
                if(Auth::guard("admin")->user()){
                    return redirect("/administrador/cooperativas");
                }  
            break;
        }

        return $next($request);
    }
}
