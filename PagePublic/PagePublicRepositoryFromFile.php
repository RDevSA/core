<?php

namespace Core\PagePublic;
class PagePublicRepositoryFromFile
{
    public function getAllComponents():array
    {
        print_r(__CLASS__.'getAllComponents: ');
        print_r(PAGE_COMPONENTS);
        return PAGE_COMPONENTS;
    }

    public function getModulesByPage(string $page):string
    {
        $config_pages = require_once CONFIG_PAGES;
        return $config_pages[$page];
    }
}