<?php
namespace Core\PagePublic;

use Core\BaseController;
use Core\libs\Twig\Twig;
use Module_Header\HeaderController;
use Module_Menu\MenuController;

class PagePublicController extends BaseController
{
    private $service;

    public function index()
    {
        $this->service=new PagePublicService();


       /* echo '<br>'."Класс: ".__CLASS__;
        echo '<br>DB_HOST = '.$_ENV['DB_HOST'];
        echo '<br>CONFIG_PAGES = '.CONFIG_PAGES.'<br>';*/
       print_r($this->service->getLayoutComponents());



        HeaderController::index();
        MenuController::index();

        $twig = new Twig();
        $twig->init();

    }


}