<?php


class TshirtController extends BaseController
{
    private $tshirtModel;
    private $uploadManager;

    function __construct()
    {
        $this->tshirtModel = new TshirtModel();
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
            $this->tshirtModel->create($_POST);
            header("Location: index.php?controller=tshirts&action=listAll");
        } else {
            return true;
        }
    }

    public function listAll()
    {

        if (!empty($_POST) && !empty($_POST["search"])) {
            $searchResults = $this->tshirtModel->search($_POST["topic"]);
            if (sizeof($searchResults) > 0) {
                return $searchResults;
            } else {
                return true;
            }
        } else {
            return $this->tshirtModel->listAll();
        }
    }

    public function view()
    {
        if (!empty($_POST) && !empty($_POST["tshirt_id"])) {
            $tshirtData = $this->tshirtModel->view($_POST["tshirt_id"]);
            $commentsOfProduct = $this->tshirtModel->listAllComments($_POST["tshirt_id"]);
            return [
                "tshirtData" => $tshirtData,
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
            $this->tshirtModel->update($_POST);
            header("Location: index.php?controller=products&action=view&product_id=" . $_GET["tshirt_id"]);
        } elseif (!empty($_GET["product_id"])) {
            return $this->tshirtModel->view($_GET["tshirt_id"]);
        }
    }

    public function delete()
    {
        if (!empty($_POST) && !empty($_POST["tshirt_id"])) {
            $this->tshirtModel->delete($_POST["tshirt_id"]);
            header("Location: index.php?controller=products&action=listAll");
        } else {
            return false;
        }
    }


}