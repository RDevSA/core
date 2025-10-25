<?php

namespace Core\PagePublic;

use Core\BaseController;
use Core\Builder\ModuleBuilder;
use Core\libs\Twig\Twig;
use Module_Header\HeaderController;
use Module_Menu\MenuController;

class PagePublicController extends BaseController
{


    private PagePublicService $service;

    public function __construct
    (
        private array  $pages,
        private string $params,
    )
    {
        $this->service = new PagePublicService();
    }


    public function index()
    {

        echo '<br>' . "Класс: " . __CLASS__;
        echo '<br>DB_HOST = ' . $_ENV['DB_HOST'];
        echo '<br>CONFIG_PAGES = ' . CONFIG_PAGES . '<br>';

        $pageBuilder = new ModuleBuilder();

        //$this->service->getModulesByPage($this->pages);
        //print_r($this->params);

        $this->service->getAllComponents();
        HeaderController::index();
        MenuController::index();

        $twig = new Twig();
        $twig->init();

    }


}