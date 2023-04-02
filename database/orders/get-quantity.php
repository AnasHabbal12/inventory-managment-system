<?php

    include ($_SERVER['DOCUMENT_ROOT'].'/IMS/database/connection.php');
    $Cells = $_POST['array'];
    
    $data = explode("/", $Cells);
    $id = (int)$data[1];
    $qte = $data[0];
    $stmt = $conn->prepare("SELECT `qte`,`price` FROM `inventory`.`products` WHERE `id`=".$id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_BOTH);
    //print_r($stmt->fetch());
    $fsay = $stmt->fetch();
    echo $fsay[0] . '/' . $fsay[1];

?>