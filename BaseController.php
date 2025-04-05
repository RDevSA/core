<?php

namespace Core;

use Core\libs\DotEnv;

class BaseController
{
    public function __construct()
    {
        //Libs::fenom('index.html');

        Dotenv::dotEnv();
        //Libs::twig();
    }

}