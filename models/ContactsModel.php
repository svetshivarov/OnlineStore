<?php

class ContactsModel extends BaseModel
{
    private $contactsRepo;

    function __construct()
    {
        $this->contactsRepo = new ContactsRepository();
    }

    public function view($id)
    {
        return $this->contactsRepo->getById($id);
    }

    public function listAll()
    {
        return $this->contactsRepo->getAll();
    }

    public function create($data)
    {
        // TODO: Implement create() method.
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}