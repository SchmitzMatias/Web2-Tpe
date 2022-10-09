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

    function showProduct($product){
        $this->smarty->assign('product',$product);

        $this->smarty->display('productDetails.tpl');
    }

    function showUpdateProductForm($id,$categories){
        $this->smarty->assign('id',$id);
        $this->smarty->assign('categories',$categories);

        $this->smarty->display('updateProductForm.tpl');
    }

    function showError($message){
        echo "Error: $message";
    }
}