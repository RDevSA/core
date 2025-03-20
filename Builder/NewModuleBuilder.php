<?php

namespace Core\Builder;

class NewModuleBuilder
{
    private $module;
    public string $css;
    public string $html;
    public string $content;

    public function setContent($content):NewModuleBuilder
    {
        $this->content = $content;
        return $this;
    }

    public function setHtml($html):NewModuleBuilder
    {
        $this->html = $html;
        echo "<br>ModuleBuilder: ".$html."<br>";
        return $this;
    }

    public function setCss(string $css):NewModuleBuilder
    {
        $this->css = $css;
        return $this;
    }

    public static function build():static
    {

        return new static();
    }

}