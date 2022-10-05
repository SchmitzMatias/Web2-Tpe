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

    function get($id){
        $query = $this->db->prepare('SELECT * from products WHERE id=?');
        $query->execute([$id]);

        $product = $query->fetch(PDO::FETCH_OBJ);

        return $product;
    }
    
    function insert($name,$description,$price,$category){
        $query = $this->db->prepare('INSERT INTO products (name,description,price,id_category_fk) VALUES(?,?,?,?)');
        $query->execute([$name,$description,$price,$category]);

        return $this->db->lastInsertId();
    }

    function delete($id) {
        $query = $this->db->prepare('DELETE FROM products WHERE id = ?');
        $query->execute([$id]);
    }

    function update($id,$name,$description,$price,$category){
        $query = $this->db->prepare('UPDATE products SET name = ? , description = ? , price = ? , id_category_fk = ? WHERE id = ? ');
        $query->execute([$name,$description,$price,$category,$id]);
    }
}