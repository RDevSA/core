<?php

namespace Core\Libs\DotEnv;

class DotEnv
{

    public static function dotEnv(bool $isTest, bool $isDev): void
    {
        $nameDevFile = $isTest?self::loadTestEnv($isDev):self::loadProdEnv($isDev);
        $dotenv = \Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'], 'env/'.$nameDevFile);
        $dotenv->load();
    }

    private static function loadTestEnv(bool $isDev):string
    {
        return $isDev?'.env.test_server.dev':'.env.test_server';
    }

    private static function loadProdEnv(bool $isDev):string
    {
        return $isDev?'.env.dev':'.env';
    }

}