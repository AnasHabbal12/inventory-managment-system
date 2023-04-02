<?php
session_start();
if(!isset($_SESSION['user']))
    {
        header('location: login.php');
    }
//print_r($_SESSION);
//print_r($_SESSION['user']) ;
include('../connection.php');

$Cells = $_POST['array'];
//$qteCells = $_POST['qte'];


$data = explode("/", $Cells);

$price = explode('|', $data[0]);
$qte = explode('|', $data[1]);
$product = explode('|', $data[4]);

$idUser = (int)$_SESSION['user']['id'];


print_r($product);
$descripeOrder = $data[2];
$idOrder = (int)$data[3];



    





try
    {
        
        $insertMethod ="INSERT INTO orders (id, lab_order, date_order) VALUES ('".$idOrder."', '".$descripeOrder."', now())";
        $conn->exec($insertMethod);
        for($i = 0; $i < sizeof($price) - 1; $i++)
        {
            $insertMethod1 ="UPDATE  products set qte = qte - '".$qte[$i]."'  WHERE id = '".$product[$i]."'";
            $conn->exec($insertMethod1);
            $insertMethod ="INSERT INTO order_detailes (id_prder, price, qte, id_product, id_user) VALUES ('".$idOrder."', '".$price[$i]."', '".$qte[$i]."', '".$product[$i]."', '".$idUser."')";
            $conn->exec($insertMethod);

        }

        echo json_encode([
            'success' => true,
            'message' => $idOrder .' '.$descripeOrder .' successfully updated'
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
