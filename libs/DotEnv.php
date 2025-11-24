<?php

namespace Core\Libs;

class DotEnv
{

    public static function dotEnv(bool $isDev): void
    {
        //$loadEnv = $isTestDomain?self::loadTestEnv():self::loadProdEnv();
        $nameDevFile = $isDev ? '.env.dev' : '.env';
        $dotenv = \Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'], 'env/'.$nameDevFile);
        $dotenv->load();
    }

    private static function loadTestEnv()
    {

    }

    private static function loadProdEnv()
    {

    }

}