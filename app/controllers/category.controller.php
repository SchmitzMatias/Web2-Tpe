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

    function getCategory($id){
        $category = $this->model->get($id);

        $this->view->showCategory($category);
    }

    function addCategory(){
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
        $this->view->showUpdateCategoryForm($id);
    }

    function saveCategoryUpdate($id){
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
        $this->model->delete($id);
        header("Location: " . BASE_URL); 
    }
}