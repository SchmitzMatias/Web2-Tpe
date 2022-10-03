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
        $query = $this->db->prepare('SELECT * from categories');
        $query->execute();

        $category = $query->fetchAll(PDO::FETCH_OBJ);

        return $category;
    }
    
    function insert($name,$description){
        $query = $this->db->prepare('INSERT INTO categories (name,description) VALUES(?,?)');
        $query->execute([$name,$description]);

        return $this->db->lastInsertId();
    }

    function delete($id) {
        $query = $this->db->prepare('DELETE FROM categories WHERE id = ?');
        $query->execute([$id]);
    }
}