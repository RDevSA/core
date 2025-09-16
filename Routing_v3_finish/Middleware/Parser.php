<?php

declare(strict_types=1);

namespace Core\Routing_v3_finish\Middleware;

class Parser
{
    public function __construct(
        private    $url =                      'garden.na4u.ru',
        private    $url_admin =                'admin.garden.na4u.ru',
        private    $url_dev =                  'dev.garden.na4u.ru',
        private    $url_admin_dev =            'admin.dev.garden.na4u.ru',
        private    $url_prod =                 'garden.ru',
        private    $url_admin_prod =           'admin.garden.ru',
        private    $url_admin_dev_prod =       'admin.dev.garden.ru',
    ) {

    }

    private function urlToArray():array
    {
        return explode('.',$this->url_admin);
    }

    private function lengthUrl():int
    {
        return count($this->urlToArray());
    }

    public function isTestServer() {
        if ($this->lengthUrl()>=3){
            $revert_url = array_reverse($this->urlToArray());
            if ($revert_url[1] === 'na4u'){
                echo "Test domain TRUE";
            }else{
                echo "Test domain FALSE";
            }
        }


    }


}
