<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        header("Access-Control-Allow-Origin: *");
             $headers = [
                 'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS' ,
                 'Access-Control-Allow-Headers' => ' Origin, Content-Type, Authorization, X-Auth-Token'
             ] ;
             if ( $request->getMethod() == "OPTIONS" ) {
                 return response()->json('OK', 200, $headers );
             }
             $response = $next( $request ) ;
             foreach ( $headers as $key => $value ) {
                 $response->header( $key, $value ) ;
             }
             return $response ;
    }
}
