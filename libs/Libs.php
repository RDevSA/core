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

    public static function twig()
    {
        /*
        $loader = new ArrayLoader([
            'index' => 'Hello {{ name }}!',
        ]);
        $twig = new Environment($loader);

        $twig->render('index', ['name' => 'Fabien']);
        */

        $loader = new FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'app');
        $twig = new Environment($loader, [
            'cache' => $_SERVER['DOCUMENT_ROOT'].'core/cache',
            'auto_reload' => true,
        ]);
        $template = $twig->load('index.html');
        echo $template->render();
    }

    public static function loader($path){
        $loader = new FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'app');
        $twig = new Environment($loader, [
            'cache' => $_SERVER['DOCUMENT_ROOT'].'core/cache',
            'auto_reload' => true,
        ]);
        $template = $twig->load('index.html');
    }

    public static function render():void
    {
        $loader = new FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'app');
        $twig = new Environment($loader, [
            'cache' => $_SERVER['DOCUMENT_ROOT'].'core/cache',
            'auto_reload' => true,
        ]);
        $template = $twig->load('index.html');
        echo $template->render();
    }

}