<?php

namespace Core\Builder;

class ModuleBuilder
{

    private string $css;
    private string $html;
    private string $js;
    private string $content;

    public function setContent($content):ModuleBuilder
    {
        $this->content = $content;
        return $this;
    }

    public function setHtml($html):ModuleBuilder
    {
        $this->html = $html;
        echo "<br>ModuleBuilder: ".$html."<br>";

        return $this;
    }

    public function setCss(string $css):ModuleBuilder
    {
        $this->css = $css;
        echo "<br>ModuleBuilder: ".$css."<br>";
        return $this;
    }

    public function setJs(string $js): ModuleBuilder
    {
        $this->js = $js;
        echo "<br>ModuleBuilder: ".$js."<br>";
        return $this;
    }



    public function build():self
    {
        return new self();
    }

}