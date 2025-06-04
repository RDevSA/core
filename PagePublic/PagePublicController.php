<?php
namespace Core\PagePublic;

use Core\BaseController;
use Core\libs\Twig\Twig;
use Module_Header\HeaderController;
use Module_Menu\MenuController;

class PagePublicController extends BaseController
{

    public function init()
    {
        echo '<br>'."Класс: ".__CLASS__;
        echo '<br>DB_HOST = '.$_ENV['DB_HOST'];
        echo '<br>CONFIG_PAGES = '.CONFIG_PAGES;

        HeaderController::index();
        MenuController::index();
        $twig = new Twig();
        //$twig = new v2_Twig();
        $twig->init();

    }



}