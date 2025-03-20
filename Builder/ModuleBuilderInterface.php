<?php

namespace Core\Builder;

interface ModuleBuilderInterface
{
    public function setContent($content);
    public function setHtml($html);
    public function setCss(string $css);
}