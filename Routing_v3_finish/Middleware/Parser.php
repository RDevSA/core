<?php

declare(strict_types=1);

namespace Core\Routing_v3_finish\Middleware;

class Parser
{

    public function __construct(
        private    $url =                      'https://garden.na4u.ru/',
        private    $url_admin =                'https://admin.garden.na4u.ru/',
        private    $url_dev =                  'https://dev.garden.na4u.ru/',
        private    $url_admin_dev =            'https://admin.dev.garden.na4u.ru/',
        private    $url_prod =                 'https://garden.ru/',
        private    $url_admin_prod =           'https://admin.garden.ru/',
        private    $url_admin_dev_prod =       'https://admin.dev.garden.ru/'
    ) {}

    public function isTestServer() {}

    
}
