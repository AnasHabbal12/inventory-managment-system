<?php
    include ($_SERVER['DOCUMENT_ROOT'].'/IMS/database/connection.php');
    $stmt = $conn->prepare("SELECT id,lab_prod,price from `products` ");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
?>