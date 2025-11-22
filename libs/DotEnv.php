<?php

namespace Core\Libs;

class DotEnv
{
    public static function dotEnv(bool $isDev):void
    {
        $nameDevFile = $isDev?'.env.dev':'.env';
        $dotenv = \Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'],$nameDevFile);
        $dotenv->load();
    }

}