<?php

namespace Core;

use Libs\Libs;

class BaseController
{
    public function __construct()
    {
        echo '<br>Base<br>';
        Libs::fenom();
        Libs::dotEnv();
    }

}