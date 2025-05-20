<?php

namespace Core\Libs\Twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class v2_Twig
{


    public function init()
    {
        $loader = new FilesystemLoader(APP_ROOT);
        $loader->prependPath(APP_ROOT_MODULE.'/module_header/view/html','public');
        $twig = new Environment($loader);

        //$template = $twig->load('test.html.twig');
        //echo $template->renderBlock('title');

        echo $twig->render('test.html.twig');
    }



}