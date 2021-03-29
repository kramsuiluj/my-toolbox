<?php 

require_once 'user.php';

// Declare the parameters that are needed to connect to the database.
$name = 'toolbox';
$host = 'localhost';
$user = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$name";

try {

    // Creates an instance of the database connection.
    $pdo = new PDO ($dsn, $user, $pass);

    // Sets the error mode of the database connection instance into exception mode.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    echo 'There was an error while connecting to the database: ' . $e->getMessage();

}

$user = new User($pdo);

?>