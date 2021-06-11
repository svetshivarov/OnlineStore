<?php

class OrderController extends BaseController
{
    private $orderModel;

    function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    public function create()
    {
        if (!empty($_POST) && !empty($_POST["create"])) {
            $this->orderModel->create($_POST);
            header("Location: index.php?controller=orders&action=create");
        } else {
            return true;
        }
    }

    public function listAll() {
        return $this->orderModel->listAll();
    }


    public function view()
    {
        if (!empty($_POST) && !empty($_POST["order_id"])) {
            $orderData = $this->orderModel->view($_POST["order_id"]);
            return [
                "orderData"=>$orderData,
            ];
        } else {
            return false;
        }
    }

    public function update()
    {
        if (!empty($_POST["update"])) {
            $this->orderModel->update($_POST);
            header("Location: index.php?controller=orders&action=view&order_id=" . $_GET["order_id"]);
        } elseif (!empty($_GET["order_id"])) {
            return $this->orderModel->view($_GET["order_id"]);
        }
    }

    public function delete()
    {
        if (!empty($_POST) && !empty($_POST["order_id"])) {
            $this->orderModel->delete($_POST["order_id"]);
            header("Location: index.php?controller=orders&action=listAll");
        } else {
            return false;
        }
    }


}