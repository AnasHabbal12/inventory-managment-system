<?php
    include ($_SERVER['DOCUMENT_ROOT'].'/IMS/database/connection.php');
    $stmt = $conn->prepare("SELECT IfNull(max(id+1),1) from `orders` as `ordersid`");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_BOTH);
    return $stmt->fetchAll();
?>