<?php

require_once 'app/models/product.model.php';
require_once 'app/views/product.view.php';

class ProductController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new ProductModel;
        $this->categoryModel = new CategoryModel;
        $this->view = new ProductView;
    }

    function getProducts(){
        $products = $this->model->getAll();
        $categories = $this->categoryModel->getAll();

        $this->view->showProducts($products,$categories);
    }

    function getProductsByCategory($categoryId){
        $products = $this->model->getAllByCategoryId($categoryId);

        $this->view->showProducts($products,null); //TODO validar el null, repensarlo.
    }

    function getProduct($id){
        $product = $this->model->get($id);

        $this->view->showProduct($product);
    }

    function addProduct(){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        echo $category;
        if(empty($name)||empty($price)){
            $this->view->showError("Faltan datos obligatorios");
            die();
        }
        
        $id = $this->model->insert($name,$description, $price, $category);

        header("Location: " . BASE_URL); 
    }

    function removeProduct($id) {
        $this->model->delete($id);
        header("Location: " . BASE_URL); 
    }
}