<?php

require_once 'app/models/category.model.php';
require_once 'app/views/category.view.php';
require_once 'app/helpers/auth.helper.php';

class CategoryController{

    private $model;
    private $view;
    private $authHelper;

    function __construct(){
        $this->model = new CategoryModel;
        $this->view = new CategoryView;
        $this->authHelper = new AuthHelper();
    }

    function showCategories(){
        session_start();
        $categories = $this->model->getAll();

        $this->view->showCategories($categories);
    }

    function getCategory($id){
        $category = $this->model->get($id);

        $this->view->showCategory($category);
    }

    function addCategory(){
        $this->authHelper->checkLoggedIn();
        $name = $_POST['name'];
        $description = $_POST['description'];

        if(empty($name)||empty($description)){
            $this->view->showError("Faltan datos obligatorios");
            die();
        }
        
        $id = $this->model->insert($name,$description); //TODO do something with this id or remove variable

        header("Location: " . BASE_URL); 
    }

    function updateCategory($id){
        $this->authHelper->checkLoggedIn();
        $this->view->showUpdateCategoryForm($id);
    }

    function saveCategoryUpdate($id){
        $this->authHelper->checkLoggedIn();
        $name = $_POST['name'];
        $description = $_POST['description'];
        
        $category = $this->model->get($id);

        if(!empty($name)){
            $category->name= $name;
        }
        if(!empty($description)){
            $category->description= $description;
        }

        $this->model->update($id,$category->name,$category->description);
        
        header("Location: " . BASE_URL);
    }

    function removeCategory($id) {
        $this->authHelper->checkLoggedIn();
        $this->model->delete($id);
        header("Location: " . BASE_URL); 
    }
}