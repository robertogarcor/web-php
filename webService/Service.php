<?php

/*
 * Web service of products to be consumed by Mobile App 
 */

/**
 * Description of Services json
 *
 * @author Roberto García Córcoles
 * @version 2017/07/29/A
 */

require_once './Product.php';

/**
 * Management class from service json request/reponse products
 */
class Service {
    
    private $json = null;
    
    /**
     * Get json service product
     * JSON_UNESCAPED_UNICODE - Treat characters ñ / accent
     * @return type json encode response
     */
    public function getAllProduct() {
        $res = Product::getAll();
        //var_dump($res);
        if ($res) {
            $this->json = json_encode(array('state' => 1, 'product' => $res), JSON_UNESCAPED_UNICODE);
        } else {
            $this->json = json_encode(array('state' => 0, 'missage' => 'No products!'), JSON_UNESCAPED_UNICODE);
        }
        return $this->json;        
    }
    
    /**
     * Get json product by id
     * @return type json encode response
     */
    public function getProductById($id) { 
        $res = Product::getById($id);
        //var_dump($res);
        if ($res) {
            $this->json = json_encode(array('state' => 1, 'product' => $res), JSON_UNESCAPED_UNICODE);
        } else {
            $this->json = json_encode(array('state' => 0, 'missage' => 'No product by id!'), JSON_UNESCAPED_UNICODE);
        }
        return $this->json; 
             
    }
    
    /**
     * Get json product by limit and offset
     * @return type json encode response
     */
    public function getProductByLimitOffset($limit, $offset) {    
        $res = Product::getAllByLimitOffset($limit, $offset);
        //var_dump($res);
        if ($res) {
            $this->json = json_encode(array('state' => 1, 'product' => $res), JSON_UNESCAPED_UNICODE);
        } else {
            $this->json = json_encode(array('state' => 0, 'missage' => 'No product by Limit!'), JSON_UNESCAPED_UNICODE);
        }
        return $this->json;    
    }
    
    /**
     * Get json insert product 
     * @return type json encode response
     */
    public function insertProduct($name, $price, $amount, $description, $active) {
        $res = Product::insert($name, $price, $amount, $description, $active);
        //var_dump($res);
        if ($res['insert'] === TRUE && $res['countRow'] != 0) {
            $this->json = json_encode(array('state' => 1, 'missage' => 'Insert product OK!'), JSON_UNESCAPED_UNICODE);
        } else {
            $this->json = json_encode(array('state' => 0, 'missage' => 'No Insert product!'), JSON_UNESCAPED_UNICODE);
        }    
        return $this->json;     
    }
    
    /**
     * Get json delete product
     * @return type json encode response
     */
    public function deleteProduct($id) {
        $res = Product::delete($id);
        //var_dump($res);
        if ($res['delete'] === TRUE && $res['countRow'] != 0) {
            $this->json = json_encode(array('state' => 1, 'missage' => 'Delete product OK!'), JSON_UNESCAPED_UNICODE);
        } else {
            $this->json = json_encode(array('state' => 0, 'missage' => 'No delete product!'), JSON_UNESCAPED_UNICODE);
        }    
        return $this->json;  
    }
    
    /**
     * Get json update product
     * @return type json encode response
     */
    public function updateProduct($id, $name, $price, $amount, $description, $active) {
        $res = Product::update($id, $name, $price, $amount, $description, $active);
        //var_dump($res);
        if ($res['update'] === TRUE && $res['countRow'] != 0) {
            $this->json = json_encode(array('state' => 1, 'missage' => 'Update product OK!'), JSON_UNESCAPED_UNICODE);
        } else {
            $this->json = json_encode(array('state' => 0, 'missage' => 'No update product!'), JSON_UNESCAPED_UNICODE);
        }    
        return $this->json;     
          
    }
    
    /**
     * Get json count product
     * @return type json encode response
     */
    public function countProduct() {
        $res = Product::count();
        //var_dump($res);
        if ($res['COUNT(*)'] > 0) {
           $this->json = json_encode(array('state' => 1, 'product' => (int)$res['COUNT(*)'])); 
        } else {
           $this->json = json_encode(array('state' => 0, 'missage' => 'No products!'), JSON_UNESCAPED_UNICODE);
        }
        return $this->json;     
    }
    
      
}
