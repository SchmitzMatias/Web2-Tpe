<?php

require_once './smarty/libs/Smarty.class.php';

class ProductView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showProducts($products,$categories){
        $this->smarty->assign('products', $products);
        $this->smarty->assign('categories', $categories);

        $this->smarty->display('productList.tpl');
    }

    function showError($message){
        echo "Error: $message";
    }
}