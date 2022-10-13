<?php
require_once 'app/controllers/product.controller.php';
require_once 'app/controllers/category.controller.php';
require_once 'app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'product/list';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$productController = new ProductController();
$categoryController = new CategoryController();

$path=$params[0];

if (count($params)>1){
    if(is_numeric($params[1])){
        $id= $params[1];
    }
    else{
        $path = $path . "/" . $params[1];
    }
}

switch ($path) {
    case 'login':
        $authController = new AuthController();
        $authController->showFormLogin();
        break;
    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;    
    case 'category':
        $categoryController->getCategory($id);
        break;
    case 'category/list':
        $categoryController->getCategories();
        break;
    case 'category/new':
        $categoryController->showCategoryForm();
        break;
    case 'category/add':
        $categoryController->addCategory();
        break;
    case 'category/update':
        $id = $params[2];
        $categoryController->updateCategory($id);
        break;
    case 'category/save':
        $id = $params[2];
        $categoryController->saveCategoryUpdate($id);
        break;
    case 'category/remove':
        $id = $params[2];
        $categoryController->removeCategory($id);
        break;
    case 'product':
        $productController->getProduct($id);
        break;
    case 'product/list':
        if(!empty($params[2])&&is_numeric($params[2])){
            $id = $params[2];
            $productController->getProductsByCategory($id);
        }else{
            $productController->getProducts();
        }
        break;
    case 'product/new':
        $productController->showProductForm();
        break;
    case 'product/add':
        $productController->addProduct();
        break;
    case 'product/update':
        $id = $params[2];
        $productController->updateProduct($id);
        break;
    case 'product/save':
        $id = $params[2];
        $productController->saveProductUpdate($id);
        break;
    case 'product/delete':
        $id = $params[2];
        $productController->removeProduct($id);
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo('404 Page not found'); //esto rompe un poco el mvc
        break;
}