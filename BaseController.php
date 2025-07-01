<?php

namespace Core;

use Core\libs\DotEnv;
use core\PagePublic\PagePublicRepositoryFromFile;

abstract class BaseController
{
    public function __construct()
    {
        //Libs::fenom('index.html');
        //Libs::twig();
        Dotenv::dotEnv();
    }

    abstract public function index();


}