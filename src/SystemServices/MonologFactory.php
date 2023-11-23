<?php

namespace App\SystemServices;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MonologFactory
{
    private static $logger;

    public static function getInstance()
    {
        if (self::$logger == null) {
            self::$logger = new Logger("MeuApp");
            self::$logger->pushHandler(new StreamHandler("meuslogs.log", \Monolog\Logger::DEBUG));
            self::$logger->error('Ocorreu um erro: ');
        }

        return self::$logger;
    }
}
