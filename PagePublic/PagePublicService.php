<?php

namespace Core\PagePublic;

class PagePublicService
{

    public function __construct(
        private PagePublicRepositoryFromFile $repository = new PagePublicRepositoryFromFile()
    ){}

    public function getLayoutComponents():array
    {
        return $this->repository->getAllComponents();

    }

    public function getModulesByPage(string $page)
    {
        return $this->repository->getModulesByPage($page);
    }


}