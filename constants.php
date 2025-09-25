<?php

defined('APP_SECTION_PUBLIC')or define('APP_SECTION_PUBLIC','public');
defined('APP_SECTION_ADMIN')or define('APP_SECTION_ADMIN','admin');
defined('APP_SECTION_LK')or define('APP_SECTION_LK','lk');

defined('APP_ROOT') or define('APP_ROOT','./app');
defined('APP_ROOT_MODULE') or define('APP_ROOT_MODULE','./app/modules');

defined('CONFIG_PAGES') or define('CONFIG_PAGES',APP_ROOT.'/config_pages.php');

defined('PAGE_COMPONENTS') or define('PAGE_COMPONENTS', ['header','menu']);


defined('CONFIG_APP_SECTION') or define('CONFIG_APP_SECTION','app_section');
defined('CONFIG_APP_MODE') or define('CONFIG_APP_MODE','app_mode');
defined('CONFIG_TEST_DOMAIN') or define('CONFIG_TEST_DOMAIN','test_domain');
