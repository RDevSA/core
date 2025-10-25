<?php

namespace Core\PagePublic;

class PagePublicService
{

    private PagePublicRepositoryFromFile $repository;

    public function __construct()
    {
        $this->repository = new PagePublicRepositoryFromFile();
    }

    public function getAllComponents(): array
    {
        return $this->repository->getAllComponents();

    }

    public function getModulesByPage(string $page)
    {
        return $this->repository->getModulesByPage($page);
    }


}