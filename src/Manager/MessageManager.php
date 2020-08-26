<?php

namespace KCS\Manager;

use KCS\Repository\MessagesRepo;

class MessageManager
{
    private MessagesRepo $repo;

    public function __construct()
    {
        $this->repo = new MessagesRepo();
    }

    public function getRepository(): MessagesRepo
    {
        return $this->repo;
    }

    public function create($vardas, $emailas, $zinute): void
    {
        $this->repo->insert(
            $vardas,
            $emailas,
            $zinute
        );
    }

    public function get(int $id)
    {
        return $this->repo->get($id);
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }

    public function salinti(int $id)
    {
        $this->repo->delete($id);
    }

    public function atnaujinti(int $id, string $vardas, string $emailas, string $zinute): void
    {
        $this->repo->update(
            $id,
            $vardas,
            $emailas,
            $zinute
        );
    }
}
