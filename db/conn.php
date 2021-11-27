<?php
    $host = 'localhost';
    $db = 'attendance_db';
    $user = 'vizagre';
    $pass = 'P@ssw0rd14031506';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        echo "<h1 class='text-danger'>No database found!</h1>";
        //throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    $crud = new crud($pdo);

?>
