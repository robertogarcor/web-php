<?php

/*
 * Web service of products to be consumed by Mobile App 
 */

/**
 * Index 
 *
 * @author Roberto García Córcoles
 * @version 2017/07/31/A
 */

require_once './Service.php';


$service = new Service();

try {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $request = json_decode(file_get_contents("php://input"), TRUE);

        // POST - all
            // Pattern json in > {"service": 1, "product":"all"}
        if ( (isset($request['service']) && $request['service'] == 1) && 
                (isset($request['product']) && $request['product'] == 'all')) {
            echo $service->getAllProduct();
           
        // POST byid
            // Pattern json in > {"service" : 2, "product" : "byId", "data" : {"id" : 50}} 
        } elseif ( (isset($request['service']) && $request['service'] == 2) && 
                    (isset($request['product']) && $request['product'] == 'byId') &&
                    (isset($request['data']['id'])) ) {
            echo $service->getProductById($request['data']['id']);
            
        // POST byLimitOffset 
            // Pattern json in > {"service" : 3, "product" : "byLimit", "data" : {"limit" : 15, "offset" : 0}}
        } elseif ( (isset($request['service']) && $request['service'] == 3) && 
                    (isset($request['product']) && $request['product'] == 'byLimit') && 
                    (isset($request['data']['limit'])) && (isset($request['data']['offset'])) ) {
            echo $service->getProductByLimitOffset($request['data']['limit'], $request['data']['offset']);
            
        // POST insert
            // Pattern json in > {"service" : 4, "product" : "insert", "data" : {"name":"peonza","price":"40.7","amount":"40","description":"peonza de acero","active":"1"}}
        } elseif ( (isset($request['service']) && $request['service'] == 4) && 
                    (isset($request['product']) && $request['product'] == 'insert') &&
                    (isset($request['data'])) ) {
            echo $service->insertProduct(
                                        $request['data']['name'],
                                        $request['data']['price'],
                                        $request['data']['amount'],
                                        $request['data']['description'],
                                        $request['data']['active']);
            
        // POST update
            // Pattern json in > {"service" : 5, "product" : "update", "data" : {"id":30,"name":"peonza_45","price":"4.06","amount":"40","description":"peonza de acero_45","active":"1"}}
        } elseif ( (isset($request['service']) && $request['service'] == 5) && 
                    (isset($request['product']) && $request['product'] == 'update') &&
                    (isset($request['data'])) ) {
            echo $service->updateProduct(
                                        $request['data']['id'],
                                        $request['data']['name'],
                                        $request['data']['price'],
                                        $request['data']['amount'],
                                        $request['data']['description'],
                                        $request['data']['active']);
           
        // POST delete
            // Pattern json in > {"service" : 6, "product" : "delete", "data" : {"id" : 40}} 
        } elseif ( (isset($request['service']) && $request['service'] == 6) && 
                    (isset($request['product']) && $request['product'] == 'delete') && 
                    (isset($request['data']['id'])) ) {
            echo $service->deleteProduct($request['data']['id']);
            
        // POST count
            // Pattern json in > {"service" : 7, "product" : "count"} 
        } elseif ( (isset($request['service']) && $request['service'] == 7) && 
                    (isset($request['product']) && $request['product'] == 'count') ) {
            echo $service->countProduct();
            
        // Default
        } else {
           echo json_encode(array ('state' => 0, 'message' => 'Error! -> No exists service available!!!')); 
        } 
    }
} catch (Exception $ex) {
    echo json_encode(array ('state' => 0, 'message' => 'Error! -> Message!!!')); 
}  



?>
  
