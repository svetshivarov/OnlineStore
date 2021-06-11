<?php


class HatsController extends BaseController
{
    private $hatsModel;
    private $uploadManager;

    function __construct()
    {
        $this->hatsModel = new HatsModel();
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
            $this->hatsModel->create($_POST);
            header("Location: index.php?controller=hats&action=listAll");
        } else {
            return true;
        }
    }

    public function listAll()
    {

        if (!empty($_POST) && !empty($_POST["search"])) {
            $searchResults = $this->hatsModel->search($_POST["topic"]);
            if (sizeof($searchResults) > 0) {
                return $searchResults;
            } else {
                return true;
            }
        } else {
            return $this->hatsModel->listAll();
        }
    }

    public function view()
    {
        if (!empty($_POST) && !empty($_POST["hats_id"])) {
            $hatsData = $this->hatsModel->view($_POST["hats_id"]);
            $commentsOfProduct = $this->hatsModel->listAllComments($_POST["hats_id"]);
            return [
                "hatsData" => $hatsData,
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
            $this->hatsModel->update($_POST);
            header("Location: index.php?controller=products&action=view&product_id=" . $_GET["hats_id"]);
        } elseif (!empty($_GET["product_id"])) {
            return $this->hatsModel->view($_GET["tshirt_id"]);
        }
    }

    public function delete()
    {
        if (!empty($_POST) && !empty($_POST["hats_id"])) {
            $this->hatsModel->delete($_POST["hats_id"]);
            header("Location: index.php?controller=products&action=listAll");
        } else {
            return false;
        }
    }


}