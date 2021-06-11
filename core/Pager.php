<?php

class Pager
{
    public static function load($page = "welcome")
    {
        $controller = false;
        if (!empty($_GET)) {
            if (!empty($_GET["controller"])) {
                $page = $_GET["controller"];
                switch ($_GET["controller"]) {
                    case "blog":
                        $controller = new BlogController();
                        break;
                    case "products":
                       $controller = new ProductController();
                       break;
                    case "tshirts":
                        $controller = new TshirtController();
                        break;
                    case "shorts":
                        $controller = new ShortsController();
                        break;
                    case "hats":
                        $controller = new HatsController();
                        break;
                    case "about":
                        $controller = new AboutController();
                        break;
                    case "contacts":
                        $controller = new ContactsController();
                        break;
                    case "orders":
                        $controller = new OrderController();
                        break;
                    default:
                        $page = "404";
                        break;
                }
            }

            if (!empty($_GET["action"])) {
                $name = $_GET["action"];
                if (method_exists($controller, $name)) {
                    $data = $controller->$name();
                }
            }
        }
        return require_once VIEW_PATH . $page . ".php";
    }

    public static function loadLogin()
    {
        $page = "login";
        return require_once VIEW_PATH . $page . ".php";
    }

    public static function loadRegister()
    {
        $page = "register";
        return require_once VIEW_PATH . $page . ".php";
    }
}