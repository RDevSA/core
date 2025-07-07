<?php

namespace Core\PagePublic;
class PagePublicRepositoryFromFile
{
    public function getAllComponents():array
    {
        return PAGE_COMPONENTS;
    }

    public function getModulesByPage(string $page):string
    {
        $config_pages = require_once CONFIG_PAGES;
        return $config_pages[$page];
    }
}