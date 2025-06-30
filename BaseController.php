<?php

namespace Core;

use Core\libs\DotEnv;
use Core\Utils\DataFromFilesUtils;

class BaseController
{
    public function __construct()
    {
        //Libs::fenom('index.html');
        //Libs::twig();
        Dotenv::dotEnv();


    }

    protected function includeModules():void
    {
        $arr = [...DataFromFilesUtils::getArrayData()];

        //print_r($arr3);
        foreach ($arr as $module2){
           foreach ($module2 as $module){
               echo 'Include module '.$module.'<br>';
           }
        }
    }

}