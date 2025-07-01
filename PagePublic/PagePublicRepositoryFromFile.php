<?php

namespace Core\PagePublic;
class PagePublicRepositoryFromFile
{
    public function getLayoutComponents():array
    {
        $config_pages = require_once CONFIG_PAGES;
        $layouts = $config_pages["layouts"];

        return $layouts;
    }

    public function getModules()
    {
        $config_pages = require_once CONFIG_PAGES;

        $modules = $config_pages['modules']['main'];
        return $modules;
    }
}