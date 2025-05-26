<?php


namespace Yuanc\JwtAuth;

use Yuanc\JwtAuth\command\SecretCommand;
use Yuanc\JwtAuth\middleware\InjectJwt;
use Yuanc\JwtAuth\provider\JWT as JWTProvider;

class Service extends \think\Service
{
    public function boot()
    {
        $this->commands(SecretCommand::class);
        $this->app->middleware->add(InjectJwt::class);
    }
}
