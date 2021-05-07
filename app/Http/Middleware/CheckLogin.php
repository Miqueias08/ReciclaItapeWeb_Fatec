<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Route;
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
                file_put_contents(__DIR__.'/teste1.txt',json_encode($rota));  
                break;
        }

        return $next($request);
    }
}
