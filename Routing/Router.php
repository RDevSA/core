<?php

namespace Core\Routing;

use App\Admin\Controllers\PageAdminController;
use App\Lk\Controllers\PageLkController;
use App\Public\Controllers\PagePublicController;
use Core\Constants;

class Router
{

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        self::getClassController();
    }

    /**
     * Получаем информацию о разделе приложения (public,admin и т.д.)
     * @return string
     */
    private static function getSectionFromUrl(): string
    {

        $url = explode('.', $_SERVER['HTTP_HOST']);

        return match (true){
            in_array(Constants::SECTION_ADMIN,$url)=>Constants::SECTION_ADMIN,
            in_array(Constants::SECTION_LK,$url)=>Constants::SECTION_LK,
            default => Constants::SECTION_PUBLIC
        };

    }

    /**
     * Возвращаем полный путь к текущей странице
     * @return string[]
     */
    private static function getPagesFromUrl(): array
    {
        $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        return $url ? explode('/', $url) : ['main'];
    }

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

    private static function getClassController():void
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
            $controller->init();
        } else {
            echo "Страница {$path} отсутствует" . '<br>';
        };
    }

    private static function pathToObject()
    {
        $path = (object)self::getSectionFromUrl();

        return $path;
    }


}