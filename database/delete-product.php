<?php
    $data = $_POST;
    $userId = (int) $data['user_id'];
    $firstName =$data['f_name'];
    $lastName =$data['l_name'];
    
    try
    {
        
        $insertMethod ="DELETE FROM products WHERE id={$userId} ";
        
        include('connection.php');
        $conn->exec($insertMethod);
        echo json_encode([
        'success' => true,
        'message' => $firstName .' '.$lastName .' successfully deleted'
        ]);
    }
    catch(PDOExeption $e)
    {
        echo json_encode([
        'success' => false,
        'message' => 'Error processing your requist!'
        ]);
    }

    
?>