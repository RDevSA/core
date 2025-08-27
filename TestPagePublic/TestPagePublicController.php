<?php

declare(strict_types = 1);
namespace Core\TestPagePublic;

class TestPagePublicController {
    public function getAll()
    {
        return json_encode([
            ['id' => 1],
            ['id' => 2],
            ['id' => 3]
        ]);
    }

    public function get($id) 
    {
        return json_encode(['id' => $id]);
    }
}