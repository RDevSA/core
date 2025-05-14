<?php

namespace Core\Libs\Twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class v2_Twig
{

    private static function setPrepend(): string
    {
        return APP_ROOT;
    }
    public function init()
    {
        $loader = new FilesystemLoader(APP_ROOT);
        //$loader->addPath(self::setPrepend());
        $twig = new Environment($loader);

        $template = $twig->load('test.html.twig');
        echo $template->renderBlock('title');

        //echo $twig->render('index.html.twig');
    }



}