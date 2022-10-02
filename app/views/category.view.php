<?php
require_once './smarty/libs/Smarty.class.php';

class CategoryView{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    function showCategories($categories){
        $this->smarty->assign('categories', $categories);

        $this->smarty->display('categoryList.tpl');
    }

    function showError($message){
        echo "Error: $message";
    }
}