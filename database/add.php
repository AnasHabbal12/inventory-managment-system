<?php
session_start();
$tableName = $_SESSION['table'];

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$encrypted = base64_encode($password);
//$encrypted = password_hash($password, PASSWORD_DEFAULT);
//adding the record.
try
{
    include('connection.php');
    $insertMethod ="INSERT INTO $tableName (first_name, last_name, email, password, created_at, updated_at) VALUES ('".$firstName."', '".$lastName."', '".$email."', '".$encrypted."', NOW(), NOW())";
    $conn->exec($insertMethod);
   
    $response = ['success' => true,
                 'message' => $firstName .' '.$lastName.' successfully added to the system '];
}
catch(PDOExeption $e)
{
    $response = ['success' => false,
                 'message' => $e->getMessage()
                 ];
}

$_SESSION['response'] = $response;
header('Location: ../user-add.php');

?>