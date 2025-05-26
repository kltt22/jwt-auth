<?php

use Yuan\JwtAuth\command\SecretCommand;
use Yuan\JwtAuth\provider\JWT as JWTProvider;
use think\Console;
use think\App;

if (strpos(App::VERSION, '5.') === 0) {
    Console::addDefaultCommands([
        SecretCommand::class
    ]);
    (new JWTProvider(app('request')))->init();
}
