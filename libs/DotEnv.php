<?php

namespace Core\Libs;

class DotEnv
{
    public static function dotEnv(?bool $isTestDomain = null, ?bool $isDev = null): void
    {
        $nameDevFile = $isDev ? '.env.dev' : '.env';
        $dotenv = \Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'], 'env/'.$nameDevFile);
        $dotenv->load();
    }

}