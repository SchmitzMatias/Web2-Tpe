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

    function showCategoryForm(){
        $this->smarty->assign('action',"category/add");
        $this->smarty->assign('buttonText',"Agregar");

        $this->smarty->display('categoryForm.tpl');
    }

    function showCategory($category){
        $this->smarty->assign('category',$category);

        $this->smarty->display('categoryDetails.tpl');
    }

    function showUpdateCategoryForm($id){
        $this->smarty->assign('id',$id);
        $this->smarty->assign('action',"category/save/$id");
        $this->smarty->assign('buttonText',"Guardar");

        $this->smarty->display('categoryForm.tpl');
    }

    function showError($message){
        echo "Error: $message";
    }
}