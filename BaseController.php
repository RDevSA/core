<?php

namespace Core;

use Libs\Libs;

class BaseController
{
    public function __construct()
    {
        //Libs::fenom('index.html');

        Libs::dotEnv();
        //Libs::twig();
    }

}