<?php 
    require('../src/Controller/ProgettoController.php');
    require('../src/System/ConnessioneDatabase.php');
    
    $dbConnection = (new ConnessioneDatabase())->getConnection();
    
    
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode( '/', $uri );
    
    // all of our endpoints start with /person
    // everything else results in a 404 Not Found
    if ($uri[1] == 'progetto') {
        $Progettoid=null;
        if (isset($uri[2])) {
            $Progettoid=(int) $uri[2];
        }
    }
    
    
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    
    // pass the request method and user ID to the PersonController and process the HTTP request:
    $controller = new ProgettoController($dbConnection, $requestMethod, $Progettoid);
    $controller->processRequest();
?>