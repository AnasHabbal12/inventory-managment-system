<?php
    include ($_SERVER['DOCUMENT_ROOT'].'/IMS/database/connection.php');
    $stmt = $conn->prepare("SELECT `order_detailes`.`id`, `order_detailes`.`price`, `order_detailes`.`qte`, `order_detailes`.`id_prder`, `orders`.`lab_order`, `orders`.`date_order`, `users`.`first_name`, `products`.`lab_prod`  FROM `order_detailes` INNER JOIN `orders` on `order_detailes`.`id_prder` = `orders`.`id` INNER JOIN `users` on `order_detailes`.`id_user` = `users`.`id` INNER JOIN `products` on `order_detailes`.`id_product` = `products`.`id`");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
     /* SELECT Orders.OrderID, Customers.CustomerName
FROM Orders
INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID;*/
    ?>
  