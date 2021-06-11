<?php


class ProductModel extends BaseModel
{
    private $ProductRepository;
    function __construct() {
        $this->ProductRepository = new ProductRepository();
    }
    public function view($id)
    {
        return $this->ProductRepository->getById($id);
    }
    public function listAll()
    {
        return $this->ProductRepository->getAll();
    }

    public function listAllComments($product_id)
    {
        return $this->ProductRepository->getAllCommentsForProduct($product_id);
    }

    public function search($topic)
    {
        return $this->ProductRepository->getAllByTopic($topic);
    }
    public function update($data)
    {
        return $this->ProductRepository->update($data);
    }
    public function delete($id)
    {
        return $this->ProductRepository->delete($id);
    }

    public function create($data)
    {
        return $this->ProductRepository->create($data);
    }

    public function comment($product_id, $user_id, $comment)
    {
        return $this->ProductRepository->addComment($product_id, $user_id, $comment);
    }
}