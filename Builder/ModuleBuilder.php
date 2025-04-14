<?php

namespace Core\Builder;

use Core\libs\Twig\Twig;

class ModuleBuilder
{

    private string $css;
    private string $html;
    private string $js;
    private string $content;

    private static function setTemplatePath(string $module):string
    {
        //return ROOT_MODULE.'/module_header/view/html';
        return ROOT_MODULE.'/module_'.$module.'/view/html';

    }

    public function setContent($content):ModuleBuilder
    {
        $this->content = $content;
        return $this;
    }

    public function setHtml($html):ModuleBuilder
    {
        $this->html = $html;
        Twig::setPrepend($html);
        //Twig::setTwigLoader()->prependPath(self::setTemplatePath($html),'public');
        //echo 'path = '.self::setTemplatePath('header');
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