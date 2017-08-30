<?php

/*
 * Web service of products to be consumed by Mobile App 
 */

/**
 * Description of Product implements iProduct
 * 
 * @author Roberto García Córcoles
 * @version 2017/07/28/A
 */

require_once './Database.php';
require_once './IProduct.php';

/**
 * Management class Product that implements interface iProduct
 */
class Product implements iProduct{
    
    public static function getAll(){
        
        $sql = 'SELECT * FROM product ORDER BY name;';
        
        try {
     
            // Get connection and prepareStament and execute from query SQL
            $prst = Database::getInstance()->getDb()->prepare($sql);
            
            // execute sent 
            $prst->execute();
            
            // Return the rows
            return $prst->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $ex) {
           print 'Fail SelectAll'; 
           $ex->getMessage();
        } finally {
            // Close db
            Database::closeDb();
            //$prst = null;
        }
    }
    
    
    public static function getById($id) {
        
        $sql = 'SELECT * FROM product WHERE id = ?;';
        
        try {
             
            // Get connection and prepareStament and execute from query SQL
            $prst = Database::getInstance()->getDb()->prepare($sql);
            
            // Assing values
            $prst->bindParam(1, $id, PDO::PARAM_INT);
            
            $prst->execute();
            
            // Return the row
            return $prst->fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $ex) {
           print 'Fail selectId!';
           $ex->getMessage();
        } finally {
            Database::closeDb();
            
        }
    }
    
    public static function getAllByLimitOffset($limit, $offset) {
        
        $sql = 'SELECT * FROM product ORDER BY name LIMIT ? OFFSET ?;';
        
        try {
             
            $prst = Database::getInstance()->getDb()->prepare($sql);
            
            $prst->bindParam(1, $limit, PDO::PARAM_INT);
            $prst->bindParam(2, $offset, PDO::PARAM_INT);
            
            $prst->execute();
            
            // Return the rows
            return $prst->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $ex) {
           print 'Fail SelectLimit!'; 
           $ex->getMessage();
        } finally {
            Database::closeDb();
            
        }
    }
    
    public static function delete($id) {
        $sql = 'DELETE FROM product WHERE id = ?;';
        
        //$sql = 'DELETE FROM product WHERE id = ? and name = ?;';
        
        try {
              
            $prst = Database::getInstance()->getDb()->prepare($sql);
            
            $prst->bindParam(1, $id, PDO::PARAM_INT);
            //$prst->bindParam(2, $name, PDO::PARAM_STR);
            
            $cmd = $prst->execute();

            // Number rows affected
            $countRow = $prst->rowCount();
            
            // Return array rows affects and true/false
            return array('countRow' => $countRow, 'delete' => $cmd);
            
        } catch (PDOException $ex) {
           print 'Fail Delete!';
           $ex->getMessage();
        } finally {
            Database::closeDb();
            
        }
    }
    
    
    public static function update($id, $name, $price, $amount, $description, $active) {
        $sql = 'UPDATE product SET name = ?,'
                                . ' price = ?,'
                                . ' amount = ?,'
                                . ' description = ?,'
                                . ' active = ? '
                . 'WHERE id = ?;';
        
        try {
             
            $prst = Database::getInstance()->getDb()->prepare($sql);
            
            $prst->bindParam(1, $name, PDO::PARAM_STR);
            $prst->bindParam(2, $price, PDO::PARAM_INT);
            $prst->bindParam(3, $amount, PDO::PARAM_INT);
            $prst->bindParam(4, $description, PDO::PARAM_STR);
            $prst->bindParam(5, $active, PDO::PARAM_INT);
            $prst->bindParam(6, $id, PDO::PARAM_INT);
            
            $cmd = $prst->execute();
            $countRow = $prst->rowCount();
            
            return array('countRow' => $countRow, 'update' => $cmd);
            
        } catch (PDOException $ex) {
           print 'Fail Update!';
           $ex->getMessage();
        } finally {
            Database::closeDb();
            
        }
    }
    
    
    public static function insert($name, $price, $amount, $description, $active) {
        $sql = 'INSERT INTO product (name, price, amount, description, active) VALUES(?, ?, ?, ?, ?);';
                                
        try {
             
            $prst = Database::getInstance()->getDb()->prepare($sql);
            
            //$prst->bindParam(1, $id, PDO::PARAM_INT); //Autoincrement in db
            $prst->bindParam(1, $name, PDO::PARAM_STR);
            $prst->bindParam(2, $price, PDO::PARAM_INT);
            $prst->bindParam(3, $amount, PDO::PARAM_INT);
            $prst->bindParam(4, $description, PDO::PARAM_STR);
            $prst->bindParam(5, $active, PDO::PARAM_INT);
            
            $cmd = $prst->execute();
            $countRow = $prst->rowCount();
            
            return array('countRow' => $countRow, 'insert' => $cmd);
            
        } catch (PDOException $ex) {
           print 'Fail Insert!';
           $ex->getMessage();
        } finally {
           Database::closeDb();
           
        }
    }

    public static function count() {
        $sql = 'SELECT COUNT(*) FROM product;';
        
        try {
            
            $prst = Database::getInstance()->getDB()->prepare($sql);
            
            $prst->execute();
            
            return $prst->fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $ex) {
            print 'Fail Count product';
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }
        
    }

}







