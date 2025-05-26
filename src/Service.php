<?php


namespace Yuan\JwtAuth;

use Yuan\JwtAuth\command\SecretCommand;
use Yuan\JwtAuth\middleware\InjectJwt;
use Yuan\JwtAuth\provider\JWT as JWTProvider;

class Service extends \think\Service
{
    public function boot()
    {
        $this->commands(SecretCommand::class);
        $this->app->middleware->add(InjectJwt::class);
    }
}
