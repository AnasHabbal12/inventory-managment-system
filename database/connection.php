<?php
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    //connecting to database.
    try
    {
        $conn = new PDO("mysql:host=$serverName;dbname=inventory", $userName, $password);
        //set pdo error mode to exeption.
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     
    }
    catch(\Exeption $e)
    {
        $errorMassege = $e->getMessage();
    }
?>