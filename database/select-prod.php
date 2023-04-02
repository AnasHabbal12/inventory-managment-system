<?php
    include('connection.php');
    $stmt = $conn->prepare("SELECT * FROM products ORDER BY cat");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
?>