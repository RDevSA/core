<?php

namespace Core\PagePublic;

class PagePublicService
{


    //private PagePublicRepositoryFromFile $repository;

    public function __construct(
        public PagePublicRepositoryFromFile $repository = new PagePublicRepositoryFromFile()
    ){}

    public function getLayoutComponents():array
    {
        return $this->repository->getAllComponents();

    }

    public function getModulesByPage()
    {
        return $this->repository->getModulesByPage();
    }


}