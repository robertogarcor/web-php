<?php

/*
 * Web service of products to be consumed by Mobile App 
 */

/**
 * Description of Database
 *
 * @author Roberto García Córcoles
 * @version 2017/07/27/A
 */

require_once 'config.php';


/**
 * Class encapsulating a PDO connection
 */
class Database {
    
    private static $db = null;
    private static $connPDO;
    
    /**
     * Construct Class
     */
    private function __construct(){
        try {
            self::getDb();
        } catch (PDOException $ex) {
            print 'Error Connection!';
            $ex->getMessage();    
        }
    }
    /**
     * Return instance class
     * @return type Database or null
     */
    public static function getInstance() {
        if (self::$db == null) {
            self::$db = new self();
        }
        return self::$db;
    }
    
    /**
     * Create connection type object PDO
     * @return object PDO
     */
    public function getDb() {
        if (self::$connPDO == null) {
            self::$connPDO = new PDO(DSN, 
                                     USER, 
                                     PASSWORD, 
                                     array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            
            // Enable exceptions
            self::$connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        return self::$connPDO;
    }
    
    /**
     * Close connection PDO
     */
    public function closeDb() {
        self::$connPDO = null;
    }
    
    
     
}
