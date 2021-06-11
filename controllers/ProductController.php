<?php

class ProductController extends BaseController
{
    private $productModel;
    private $uploadManager;

    function __construct()
    {
        $this->productModel = new ProductModel();
        $this->uploadManager = new UploadManager();
    }

    public function create()
    {
        if (!empty($_POST) && !empty($_POST["create"])) {
            if(empty($_FILES["file_to_upload"]["error"])) {
                $fileName = $this->uploadManager->uploadImg();
                if(!$fileName) {
                    return false;
                } else {
                    //създаване на ключ
                    $_POST["thumbnail"] = $fileName;
                }
            }
            $this->productModel->create($_POST);
            header("Location: index.php?controller=products&action=listAll");
        } else {
            return true;
        }
    }

    public function listAll()
    {

        if (!empty($_POST) && !empty($_POST["search"])) {
            $searchResults = $this->productModel->search($_POST["topic"]);
            if (sizeof($searchResults) > 0) {
                return $searchResults;
            } else {
                return true;
            }
        } else {
            return $this->productModel->listAll();
        }
    }

    public function view()
    {
        if (!empty($_POST) && !empty($_POST["product_id"])) {
            $productData = $this->productModel->view($_POST["product_id"]);
            $commentsOfProduct = $this->productModel->listAllComments($_POST["product_id"]);
            return [
                "productData"=>$productData,
                "comments"=>$commentsOfProduct
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
            $this->productModel->update($_POST);
            header("Location: index.php?controller=products&action=view&product_id=" . $_GET["product_id"]);
        } elseif (!empty($_GET["product_id"])) {
            return $this->productModel->view($_GET["product_id"]);
        }
    }

    public function delete()
    {
        if (!empty($_POST) && !empty($_POST["product_id"])) {
            $this->productModel->delete($_POST["product_id"]);
            header("Location: index.php?controller=products&action=listAll");
        } else {
            return false;
        }
    }


}