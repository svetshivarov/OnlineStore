<?php


class TshirtModel extends BaseModel
{
    private $TshirtRepository;
    function __construct() {
        $this->TshirtRepository = new TshirtRepository();
    }
    public function view($id)
    {
        return $this->TshirtRepository->getById($id);
    }
    public function listAll()
    {
        return $this->TshirtRepository->getAll();
    }

    public function listAllComments($product_id)
    {
        return $this->TshirtRepository->getAllCommentsForProduct($product_id);
    }

    public function search($topic)
    {
        return $this->TshirtRepository->getAllByTopic($topic);
    }
    public function update($data)
    {
        return $this->TshirtRepository->update($data);
    }
    public function delete($id)
    {
        return $this->TshirtRepository->delete($id);
    }

    public function create($data)
    {
        return $this->TshirtRepository->create($data);
    }

    public function comment($product_id, $user_id, $comment)
    {
        return $this->TshirtRepository->addComment($product_id, $user_id, $comment);
    }
}