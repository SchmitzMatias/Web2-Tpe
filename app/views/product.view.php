<?php

require_once './smarty/libs/Smarty.class.php';

class ProductView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showProducts($products){
        $this->smarty->assign('products', $products);
        

        $this->smarty->display('productList.tpl');
    }

    function showProductForm($categories){
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('action',"product/add");
        $this->smarty->assign('buttonText',"Agregar");

        $this->smarty->display('productForm.tpl');
    }

    function showProduct($product){
        $this->smarty->assign('product',$product);

        $this->smarty->display('productDetails.tpl');
    }

    function showUpdateProductForm($id,$categories){
        $this->smarty->assign('categories',$categories);
        $this->smarty->assign('action',"product/save/$id");
        $this->smarty->assign('buttonText',"Guardar");

        $this->smarty->display('productForm.tpl');
    }

    function showError($message){
        echo "Error: $message";
    }
}