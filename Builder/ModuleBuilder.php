<?php

namespace Core\Builder;

class ModuleBuilder implements ModuleBuilderInterface
{
    private Module $module;

    public function __construct(Module $module)
    {
        $this->module = $module;
    }


    public function setContent($content):ModuleBuilder
    {
        $this->module->content = $content;
        return $this;
    }

    public function setHtml($html):ModuleBuilder
    {
        $this->module->html = $html;
        echo "<br>ModuleBuilder: ".$html."<br>";
        return $this;
    }

    public function setCss(string $css):ModuleBuilder
    {
        $this->module->css = $css;
        return $this;
    }

    public function build():Module
    {
        return $this->module;
    }
}