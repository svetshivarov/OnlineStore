<?php
require_once "navigation.php";


if(!empty($data)) {
    if(!empty($_GET["action"])) {
        switch ($_GET["action"]) {
            case "create":
                require_once "html/order/OrderCreate.php";
                break;
            case "listAll":
                require_once "html/order/OrderList.php";
                break;
            case "view":
                require_once "html/order/OrderView.php";
                break;
            case "update":
                require_once "html/order/OrderUpdate.php";
                break;
            default:
                require_once "html/order/OrderList.php";
                break;
        }
    }
}

require_once "footer.php";

?>




