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
        $DB_PORT=$_ENV['DB_PORT'];
        $mysqli = new mysqli("$DB_HOST", "$DB_USER", "$DB_PASSWORD", "$DB_NAME", "$DB_PORT");
        return $mysqli;
    }
    catch(PDOException $e) {
    echo $e->getMessage();
    }
}

function borrar(){
        $mysqli = connect(); //DELETE ALL FROM lista
        $query = "DELETE FROM lista";
        $result = $mysqli->query($query);

}

function select(){
    $mysqli = connect();
    $query = "SELECT * FROM lista";
    $result = $mysqli->query($query);
    foreach ($result as $row) {
        echo $row['nombre']."<br>";
    }
    
}

    require 'ejer1.view.php';
