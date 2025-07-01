<?php

namespace Core\PagePublic;

class PagePublicService
{
    //private PagePublicRepositoryFromFile $repository;

    public function __construct(
        public PagePublicRepositoryFromFile $repository = new PagePublicRepositoryFromFile()
    )
    {

    }

    public function getLayoutComponents()
    {
        return $this->repository->getLayoutComponents();

    }


}