<?php

namespace Libs;
use Dotenv\Dotenv;
use Fenom;
use Twig\Environment;
use Twig\Loader\ArrayLoader;
use Twig\Loader\FilesystemLoader;

class Libs
{


    public static function dotEnv():void
    {
        $dotenv =Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
        $dotenv->load();
    }

    public static function fenom($temp)
    {
        $temps = $_SERVER['DOCUMENT_ROOT'].'core/temps';
        $fenom = Fenom::factory($temps);
        $fenom->display($temp);
    }

    public static function twig():void
    {

        $moduleTemplates = './app/modules/module_header/view/html';
        $loader = new FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'/app');
        $loader->addPath($moduleTemplates,'public');
        $twig = new Environment($loader, [
            'cache' => $_SERVER['DOCUMENT_ROOT'].'core/cache',
            'auto_reload' => true,
        ]);
        $template = $twig->load('index.html');
        echo $template->render();
    }

    public static function loader($path):void
    {
        $loader = new FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'app');
        $moduleTemplates = './app/modules/module_header/view/html';
        $loader->addPath($moduleTemplates,'public');
        $twig = new Environment($loader, [
            'cache' => $_SERVER['DOCUMENT_ROOT'].'core/cache',
            'auto_reload' => true,
        ]);
        $template = $twig->load('index.html');
    }

    public static function render():void
    {
       //echo $template->render();
    }

}