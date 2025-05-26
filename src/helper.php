<?php

use Yuanc\JwtAuth\command\SecretCommand;
use Yuanc\JwtAuth\provider\JWT as JWTProvider;
use think\Console;
use think\App;

if (strpos(App::VERSION, '5.') === 0) {
    Console::addDefaultCommands([
        SecretCommand::class
    ]);
    (new JWTProvider(app('request')))->init();
}
