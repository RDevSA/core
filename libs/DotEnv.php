<?php

namespace Core\Libs;

class DotEnv
{
    public static function dotEnv():void
    {
        $dotenv = \Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
        $dotenv->load();
    }

}