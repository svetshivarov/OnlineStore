<?php


class ShortsController extends BaseController
{
    private $shortsModel;
    private $uploadManager;

    function __construct()
    {
        $this->shortsModel = new ShortsModel();
        $this->uploadManager = new UploadManager();
    }

    public function create()
    {
        if (!empty($_POST) && !empty($_POST["create"])) {
            if (empty($_FILES["file_to_upload"]["error"])) {
                $fileName = $this->uploadManager->uploadImg();
                if (!$fileName) {
                    return false;
                } else {
                    //създаване на ключ
                    $_POST["thumbnail"] = $fileName;
                }
            }
            $this->shortsModel->create($_POST);
            header("Location: index.php?controller=shorts&action=listAll");
        } else {
            return true;
        }
    }

    public function listAll()
    {

        if (!empty($_POST) && !empty($_POST["search"])) {
            $searchResults = $this->shortsModel->search($_POST["topic"]);
            if (sizeof($searchResults) > 0) {
                return $searchResults;
            } else {
                return true;
            }
        } else {
            return $this->shortsModel->listAll();
        }
    }

    public function view()
    {
        if (!empty($_POST) && !empty($_POST["tshirt_id"])) {
            $shortsData = $this->shortsModel->view($_POST["tshirt_id"]);
            $commentsOfProduct = $this->shortsModel->listAllComments($_POST["tshirt_id"]);
            return [
                "tshirtData" => $shortsData,
                "comments" => $commentsOfProduct
            ];
        } else {
            return false;
        }
    }

    public function update()
    {
        if (!empty($_POST["update"])) {
            if (empty($_FILES["file_to_upload"]["error"])) {
                $fileName = $this->uploadManager->uploadImg();
                if (!$fileName) {
                    echo "Error on upload";
                } else {
                    $_POST["thumbnail"] = $fileName;
                }
            }
            $this->shortsModel->update($_POST);
            header("Location: index.php?controller=products&action=view&product_id=" . $_GET["shorts_id"]);
        } elseif (!empty($_GET["product_id"])) {
            return $this->tshirtModel->view($_GET["tshirt_id"]);
        }
    }

    public function delete()
    {
        if (!empty($_POST) && !empty($_POST["shorts_id"])) {
            $this->shortsModel->delete($_POST["shorts_id"]);
            header("Location: index.php?controller=products&action=listAll");
        } else {
            return false;
        }
    }


}