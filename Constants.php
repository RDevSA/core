<?php
namespace Core;

class Constants
{
    const string SECTION_PUBLIC = "public";
    const string SECTION_ADMIN = "admin";
    const string SECTION_LK ="lk";


}
defined('SECTION_PUBLIC')or define('SECTION_PUBLIC','public');
defined('SECTION_ADMIN')or define('SECTION_ADMIN','admin');
defined('SECTION_LK')or define('SECTION_LK','lk');

defined('ROOT') or define('ROOT','./app');
defined('ROOT_MODULE') or define('ROOT_MODULE','./app/modules');

