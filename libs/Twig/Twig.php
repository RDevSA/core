<?php

namespace Core\libs\Twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig
{
    private static array $prepend;

    public static function getPrepend(): array
    {
        return self::$prepend;
    }

    public static function setPrepend(string $path): void
    {
        $moduleTemplate = ROOT_MODULE.'/module_'.$path.'/view/html';
        self::$prepend[] = $moduleTemplate;
    }

    public static function setTwigLoader():FilesystemLoader
    {
        $moduleTemplates = ROOT_MODULE.'/module_header/view/html';

        $loader = new FilesystemLoader(ROOT);
        //$loader->prependPath($moduleTemplates,'public');
        foreach (self::getPrepend() as $template) {
            $loader->prependPath($template,'public');
        }
        return $loader;
    }



    public function init():void
    {


        //print_r(self::getPrepend());
        //self::setTwigLoader()->prependPath(ROOT_MODULE.'/module_header/view/html','public');
        $twig = new Environment(self::setTwigLoader(), [
            'cache' => $_SERVER['DOCUMENT_ROOT'].'core/cache',
            'auto_reload' => true,
        ]);
        $template = $twig->load('index.html.twig');
        echo $template->render();
    }


}