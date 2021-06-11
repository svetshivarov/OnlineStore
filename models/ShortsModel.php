<?php


class ShortsModel extends BaseModel
{
    private $ShortsRepository;
    function __construct() {
        $this->ShortsRepository = new ShortsRepository();
    }
    public function view($id)
    {
        return $this->ShortsRepository->getById($id);
    }
    public function listAll()
    {
        return $this->ShortsRepository->getAll();
    }

    public function listAllComments($product_id)
    {
        return $this->ShortsRepository->getAllCommentsForProduct($product_id);
    }

    public function search($topic)
    {
        return $this->ShortsRepository->getAllByTopic($topic);
    }
    public function update($data)
    {
        return $this->ShortsRepository->update($data);
    }
    public function delete($id)
    {
        return $this->ShortsRepository->delete($id);
    }

    public function create($data)
    {
        return $this->ShortsRepository->create($data);
    }

    public function comment($product_id, $user_id, $comment)
    {
        return $this->ShortsRepository->addComment($product_id, $user_id, $comment);
    }
}