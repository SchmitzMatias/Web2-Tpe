<?php

require_once 'app/models/product.model.php';
require_once 'app/views/product.view.php';

class ProductController{

    private $model;
    private $view;
    private $authHelper;

    function __construct(){
        $this->model = new ProductModel;
        $this->categoryModel = new CategoryModel;
        $this->view = new ProductView;

        $this->authHelper = new AuthHelper();
    }

    function getProducts(){
        session_start(); //TODO este hizo que se vea el boton de logout (cuando aplique) al listar productos (que es free access)
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
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        if(empty($name)||empty($price)){
            $this->view->showError("Faltan datos obligatorios");
            die();
        }
        
        $id = $this->model->insert($name,$description, $price, $category);

        header("Location: " . BASE_URL); 
    }

    function updateProduct($id){
        $this->authHelper->checkLoggedIn();
        $categories = $this->categoryModel->getAll();

        $this->view->showUpdateProductForm($id,$categories);
    }

    function saveProductUpdate($id){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category']; //TODO this has to be a id_cat_fk, not name, maybe add cat_id on product? on top of name i mean.
        $product = $this->model->get($id);

        if(!empty($name)){
            $product->name= $name;
        }
        if(!empty($description)){
            $product->description= $description;
        }
        if(!empty($price)){
            $product->price= $price;
        }
        if(!empty($category) && $category!=0){
            $product->id_category_fk= $category;
        }
        $this->model->update($id,$product->name,$product->description,$product->price,$product->id_category_fk);

        header("Location: " . BASE_URL);
    }

    function removeProduct($id) {
        $this->model->delete($id);
        header("Location: " . BASE_URL); 
    }
}