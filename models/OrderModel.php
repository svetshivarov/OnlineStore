<?php


class OrderModel extends BaseModel
{
    private $OrderRepository;

    function __construct()
    {
        $this->OrderRepository = new OrderRepository();
    }

    public function view($id)
    {
        return $this->OrderRepository->getById($id);
    }

    public function update($data)
    {
        return $this->OrderRepository->update($data);
    }

    public function delete($id)
    {
        return $this->OrderRepository->delete($id);
    }

    public function create($data)
    {
        return $this->OrderRepository->create($data);
    }

    public function listAll()
    {
        return $this->OrderRepository->getAll();
    }
}