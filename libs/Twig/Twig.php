<?php

namespace Core\libs\Twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig
{
    public static function init():void
    {

        $moduleTemplates = './app/modules/module_header/view/html';
        $loader = new FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'/app');
        $loader->prependPath($moduleTemplates,'public');
        $twig = new Environment($loader, [
            'cache' => $_SERVER['DOCUMENT_ROOT'].'core/cache',
            'auto_reload' => true,
        ]);
        $template = $twig->load('index.html.twig');
        echo $template->render();
    }
}