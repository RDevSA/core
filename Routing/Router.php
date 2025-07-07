<?php

namespace Core\Routing;

use App\Admin\Controllers\PageAdminController;
use Core\PagePublic\PagePublicController;
use Lk\Controller\PageLkController;


class Router
{

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        //self::getClassController();
        $this->test();
    }

    private function test():void
    {
       /* $url = explode('.', $_SERVER['HTTP_HOST']);
        print_r($url);
        $url2 = $_SERVER['REQUEST_URI'];
        print_r($url2);
        $page = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');;
        print_r($page);*/

        $url = $_SERVER['HTTP_HOST'];
        print_r($url);
        $url2 = $_SERVER['REQUEST_URI'];
        print_r($url2);
    }

    /**
     * Получаем информацию о разделе приложения (public,admin и т.д.)
     * @return string
     */
    private static function getSectionFromUrl(): string
    {
        $url = explode('.', $_SERVER['HTTP_HOST']);

        //TODO need to refactor
        return match (true){
            in_array(APP_SECTION_ADMIN,$url)=>APP_SECTION_ADMIN,
            in_array(APP_SECTION_LK,$url)=>APP_SECTION_LK,
            default => APP_SECTION_PUBLIC
        };

    }

    /**
     * Возвращаем полный путь к текущей странице
     * @return string[]
     */
    private static function getPagesFromUrl(): array
    {
        $page = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        return $page ? explode('/', $page) : ['main'];
    }

    //TODO need to refactor (must receive any numbers of params and return array or object)
    /**
     * Возвращаем GET параметры (после знака ? в адресе страницы)
     * @return string
     */
    private static function parseGetParam():string
    {
        $getParam = $_GET['test'] ?? "Параметр test не обнаружен";
        echo '<br>' . '$_GET[test] = ' . $getParam . '<br>';
        return $getParam;
    }

    //TODO need to refactor
/*    private static function getClassController():void
    {
        $section = self::getSectionFromUrl();

        $path = match ($section) {
            'public' => PagePublicController::class,
            'admin' => PageAdminController::class,
            'lk'=>PageLkController::class,
            default => 'Контроллер ' . $section . 'отсутствует'
        };

        if (Routes::isRoute($path)) {
            $controller = new $path(self::getPagesFromUrl(),self::parseGetParam());
            $controller->index();
        } else {
            echo "Страница {$path} отсутствует" . '<br>';
        };
    }*/

    /*private static function pathToObject()
    {
        $path = (object)self::getSectionFromUrl();

        return $path;
    }*/


}