<?php


class HatsModel extends BaseModel
{
    private $HatsRepository;
    function __construct() {
        $this->HatsRepository = new HatsRepository();
    }
    public function view($id)
    {
        return $this->HatsRepository->getById($id);
    }
    public function listAll()
    {
        return $this->HatsRepository->getAll();
    }

    public function listAllComments($product_id)
    {
        return $this->HatsRepository->getAllCommentsForProduct($product_id);
    }

    public function search($topic)
    {
        return $this->HatsRepository->getAllByTopic($topic);
    }
    public function update($data)
    {
        return $this->HatsRepository->update($data);
    }
    public function delete($id)
    {
        return $this->HatsRepository->delete($id);
    }

    public function create($data)
    {
        return $this->HatsRepository->create($data);
    }

    public function comment($product_id, $user_id, $comment)
    {
        return $this->HatsRepository->addComment($product_id, $user_id, $comment);
    }
}