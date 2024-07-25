<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       $response = $next($request);

        // // $response->headers->set('Access-Control-Allow-Origin', 'http://bac-dev08:8081');
        // $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:3001');

        // $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        // $response->headers->set('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
        // $response->headers->set('Access-Control-Allow-Credentials', 'true');

        return $response;
    }
}
