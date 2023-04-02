<?php
    $data = $_POST;
    $userId = (int) $data['user_Id'];
    $firstName = $data['f_name'];
    $lastName = $data['l_name'];
    $email = $data['email'];
    $now = date('y-m-d H:i:s');
    try
    {       
        $sql ="UPDATE users SET email=?, last_name=?, first_name=? ,updated_at=? WHERE id=?";
        include('connection.php');
        $conn->prepare($sql)->execute([$email, $lastName, $firstName, $now, $userId]);
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
        echo "4r";
    }   
?>