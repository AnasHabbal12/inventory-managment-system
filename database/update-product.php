<?php
    $data = $_POST;
    $productId = (int) $data['user_Id'];
    $lableProduct = $data['f_name'];
    $price =(int) $data['l_name'];
    $quantity =(int) $data['email'];
    
    try
    {       
        $sql ="UPDATE products SET lab_prod=?, price=?, qte=? WHERE id=?";
        include('connection.php');
        $conn->prepare($sql)->execute([$lableProduct, $price, $quantity, $productId]);
        echo json_encode([
        'success' => true,
        'message' => $firstName .' '.$lastName .' successfully updated'
        ]);
    }
    catch(PDOExeption $e)
    {
        echo json_encode([
        'success' => false,
        'message' => 'Error processing your requist!'
        ]);
        echo "Eror";
    }   
?>