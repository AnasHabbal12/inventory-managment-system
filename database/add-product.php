<?php
    session_start();
    $tableName = $_SESSION['table'];   
    $lableProduct = $_POST['lableProduct'];
    $price = (int) $_POST['price'];
    $cat = $_POST['category'];
    $qty = (int) $_POST['qty'];
    $img = $_POST['imageProduct'];
    //adding the record.
    
    try
    {
        include('connection.php');
        $insertMethod ="INSERT INTO $tableName (lab_prod, price, image, cat, qte) VALUES ('".$lableProduct."', '".$price."', '".$img."', '".$cat."','".$qty."' )";
        $conn->exec($insertMethod);
       
        $response = ['success' => true,
                     'message' => $lableProduct .' successfully added to the system '];
    }
    catch(PDOExeption $e)
    {
        $response = ['success' => false,
                     'message' => $e->getMessage()
                     ];
    }
    $_SESSION['response'] = $response;
    header('Location: ../add-prodht.php');

?>