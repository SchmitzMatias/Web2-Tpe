<?php

require_once 'app/models/category.model.php';
require_once 'app/views/category.view.php';

class CategoryController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new CategoryModel;
        $this->view = new CategoryView;
    }

    function showCategories(){
        $categories = $this->model->getAll();

        $this->view->showCategories($categories);
    }

    function addCategory(){
        $name = $_POST['name'];
        $description = $_POST['description'];

        if(empty($name)||empty($description)){
            $this->view->showError("Faltan datos obligatorios");
            die();
        }
        
        $id = $this->model->insert($name,$description);

        header("Location: " . BASE_URL); 
    }
}