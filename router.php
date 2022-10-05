<?php
require_once 'app/controllers/product.controller.php';
require_once 'app/controllers/category.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'product/list';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

// instancio el unico controller que existe por ahora
$productController = new ProductController();
$categoryController = new CategoryController();
// product/list -> lista todos los pro
// product/detail/ID -> lista un solo producto
// category -> lista todas las categorias

// tabla de ruteo
//switch ($params[0] . '/' . $params[1])
if(is_numeric($params[1])){
    $path=$params[0];
    $id= $params[1];
}
else{
    $path = $params[0] . "/" . $params[1];
}
switch ($path) {
    case 'category':
        $categoryController->getCategory($id);
        break;
    case 'category/list':
        $categoryController->showCategories();
        break;
    case 'category/add':
        $categoryController->addCategory();
        break;
    case 'category/remove':
        $id = $params[2];
        $categoryController->removeCategory($id);
        break;
    case 'product':
        $productController->getProduct($id);
        break;
    case 'product/list':
        $productController->showProducts();
        break;
    case 'product/add':
        $productController->addProduct();
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