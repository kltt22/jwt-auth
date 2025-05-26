<?php


namespace Yuanc\JwtAuth\middleware;

use think\Request;
use Yuanc\JwtAuth\provider\JWT as JWTProvider;

class InjectJwt
{
    public function handle(Request $request, $next)
    {
        (new JWTProvider($request))->init();
        $response = $next($request);
        return $response;
    }
}
