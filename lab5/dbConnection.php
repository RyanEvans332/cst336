<?php

function getDatabaseConnection($dbname = 'heroku_488940c3db99adf'){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    
    //creates db connection
    $dbConn = new PDO("msyql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}