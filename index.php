<?php 
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

function connect(){
    try {
        $DB_HOST=$_ENV['DB_HOST'];
        $DB_USER=$_ENV['DB_USER'];
        $DB_PASSWORD=$_ENV['DB_PASSWORD'];
        $DB_NAME=$_ENV['DB_NAME'];
        $dbh = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        return $dbh;
    }
    catch(PDOException $e) {
    echo $e->getMessage();
    }
}

function borrar(){
        $dbh = connect(); //DELETE ALL FROM lista
        $stmt = $dbh->prepare("DELETE  FROM lista ");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
}

function select(){
    $dbh = connect();
    $stmt = $dbh->prepare("SELECT * FROM lista");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    $lista = $stmt->fetchAll();
    foreach ($lista as $producto) {
        echo $producto->producto . "<br>";
    }
    
}

    require 'ejer1.view.php';
