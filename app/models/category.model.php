<?php

class CategoryModel{

    private $db;

    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=lify;charset=utf8', 'root', '');
        return $db;
    }

    function __construct(){
        $this->db = $this->connect();
    }

    function getAll(){
        $query = $this->db->prepare('SELECT * from category');
        $query->execute();

        $category = $query->fetchAll(PDO::FETCH_OBJ);

        return $category;
    }
    
    function insert($name,$description){
        $query = $this->db->prepare('INSERT INTO categories (name,description) VALUES(?,?)');
        $query->execute([$name,$description]);

        return $this->db->lastInsertId();
    }
}