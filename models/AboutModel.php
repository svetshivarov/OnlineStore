<?php

class AboutModel extends BaseModel
{
    private $aboutRepo;

    function __construct()
    {
        $this->aboutRepo = new AboutRepository();
    }

    public function view($id)
    {
        return $this->aboutRepo->getById($id);
    }

    public function listAll()
    {
        return $this->aboutRepo->getAll();
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function create($data)
    {
        // TODO: Implement create() method.
    }
}