<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogApiResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response_all = $request->all();
        if (str_contains($request->path(), 'api/auth')) {
            $response_all = '';
        }

        $log = [
            'method' => $request->method(),
            'uri' => $request->path(),
            'ip' => $request->getClientIp(),
            'request' => $response_all,
            'status' => $response->getStatusCode(),
            'response' => json_decode($response->getContent(), true),
        ];

        Log::channel('api')->info('API Response Log: ', $log);

        return $response;
    }
}
