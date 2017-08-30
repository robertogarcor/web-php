<?php

/*
 * Web service of products to be consumed by Mobile App 
 */

/**
 * Interface Product
 * 
 * @version 2017/07/28/A
 * @author Roberto García Córcoles
 */
interface iProduct {
    
    /**
     * Return all products
     * @return type array assoc products
     */
    public static function getAll();
    
    /**
     * Return one product from by id
     * @param type int $id product
     * @return type array row product
     */
    public static function getById($id);
    
    /**
     * Return all product by limit and offset
     * @param type int $limit number de product
     * @param type int $offset startind row to search
     * @return type array products according selection
     */
    public static function getAllByLimitOffset($limit, $offset);
    
    /**
     * Delete product
     * @param type integer $id product
     * @return type array number rows affected and TRUE/FALSE
     */
    public static function delete($id);
    
    /**
     * Update product
     * @param type $id product 
     * @param type $name product
     * @param type $price product
     * @param type $amount product
     * @param type $description product
     * @param type $active product 0/1
     * @return type type array number rows affected and TRUE/FALSE
     */
    public static function update($id, $name, $price, $amount, $description, $active);
    
    /**
     * Insert product
     * @param type $id product is autoincrement in db
     * @param type $name product
     * @param type $price product
     * @param type $amount product
     * @param type $description product
     * @param type $active product 0/1
     * @return type type array number rows affected and TRUE/FALSE
     */
    public static function insert($name, $price, $amount, $description, $active);
    
    /**
     * Count product
     * return number of products
     */
    public static function count();
    
}
