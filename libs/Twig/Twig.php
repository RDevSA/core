<?php

namespace Core\Libs\Twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
class Twig
{
    private static array $prepend;

    public function init():void
    {
        $twig = new Environment(self::setTwigLoader(), [
            'cache' => $_SERVER['DOCUMENT_ROOT'].'/core/cache',
            'auto_reload' => true,
        ]);
        $template = $twig->load('index.html.twig');
        echo $template->render();
    }

    public static function setPrepend(string $path): void
    {
        $moduleTemplate = APP_ROOT_MODULE.'/module_'.$path.'/view/html';
        self::$prepend[] = $moduleTemplate;
    }

    public static function getPrepend(): array
    {
        return self::$prepend;
    }

    public static function setTwigLoader():FilesystemLoader
    {
        $loader = new FilesystemLoader(APP_ROOT);
        foreach (self::getPrepend() as $template) {
            $loader->prependPath($template,'public');
        }
        return $loader;
    }

}