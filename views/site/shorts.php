<?php
require_once "navigation.php";

echo "
<html>
    <head>
        <title>Shorts and Pants</title>
    </head>
<body>
    <h1 class='shorts-pants'>Shorts and Pants</h1>    
</body>
</html>
";

if(!empty($data)) {
    if(!empty($_GET["action"])) {
        switch ($_GET["action"]) {
            case "create":
                require_once "html/product/ProductCreate.php";
                break;
            case "listAll":
                require_once "html/product/ProductList.php";
                break;
            case "view":
                require_once "html/product/ProductView.php";
                break;
            case "update":
                require_once "html/product/ProductUpdate.php";
                break;
            default:
                require_once "html/product/ProductList.php";
                break;
        }
    }
}

require_once "footer.php";

?>


