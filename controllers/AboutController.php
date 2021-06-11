<?php

class AboutController extends BaseController
{
    private $aboutModel;
    private $aboutId;

    function __construct() {
        $this->aboutModel = new BlogModel();

        $this->aboutId = (!empty($_GET["about_id"])) ? $_GET["about_id"] : "";
    }

    public function view() {
        if (!empty($this->aboutId)) {
            return $this->aboutModel->view($this->aboutId);
        } else {
            return "";
        }
    }

    public function listAll() {
        return $this->aboutModel->listAll();
    }
}