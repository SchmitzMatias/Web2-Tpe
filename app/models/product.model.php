<?php

class ProductModel{

    private $db;

    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=lify;charset=utf8', 'root', '');
        return $db;
    }

    function __construct(){
        $this->db = $this->connect();
    }

    function getAll(){
        $query = $this->db->prepare('SELECT * from products');
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }
    
    function insert($name,$description,$price,$category){
        $query = $this->db->prepare('INSERT INTO products (name,description,price,id_category_fk) VALUES(?,?,?,?)');
        $query->execute([$name,$description,$price,$category]);

        return $this->db->lastInsertId();
    }
}