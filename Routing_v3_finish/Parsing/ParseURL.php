<?php

namespace Core\Routing_v3_finish\Parsing;

class ParseURL
{


    public function __construct(private readonly string $url)
    {

    }

    public function urlToArray(): array
    {
        $trim_url = rtrim(ltrim($this->url,'/'),'/');
        $url_to_array = explode('/', $trim_url);
        return array_merge($url_to_array);
    }

    public function getController ():string
    {
        return $this->urlToArray()[0]?:'main';
    }

}