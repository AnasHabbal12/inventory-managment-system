<?php
    //Start The Session
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('location: login.php');
    }
    $_SESSION['table'] = 'users';
    $user = $_SESSION['user'];
    $users = include('database/orders/get-Orders.php');
?>
<html>
    <head>
        <title>IMS Login - Inventory Management System</title>
        <link rel="stylesheet" type="text/css" href="css/IMS.css"/>
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" integrity="sha512-PvZCtvQ6xGBLWHcXnyHD67NTP+a+bNrToMsIdX/NUqhw+npjLDhlMZ/PhSHZN4s9NdmuumcxKHQqbHlGVqc8ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body id="dashboard">
        <div id="dashboardMainContainer">
            <?php include('partitials/app-sidebar.php') ?>
            <div id="dashboardContentContainer"> 
                <?php include('partitials/topnav.php') ?>
                <div class="dashboardContent">
                    <div class="dashboardContentMain">
                        <div class="row">
                            
                            <div class="column ">
                                <h1 class="sectionHeader"><i class="fa fa-list"></i> List of User</h1>
                                <div class="sectionContent orderTable">
                                    <div class="users">   
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Order Number</th>
                                                    <th>Order Date</th>
                                                    <th>Saller</th>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>comment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($users as $index=> $user){ ?>
                                                    <tr>
                                                        <td><?= $index +1 ?></td>
                                                        <td ><?= $user['id_prder'] ?></td>
                                                        <td ><?= date('M d,y @ h:i:s A', strtotime( $user['date_order'])) ?></td>
                                                        <td ><?= $user['first_name'] ?></td>
                                                        <td><?= $user['lab_prod'] ?></td>
                                                        <td><?= $user['price'] ?></td>
                                                        <td ><?= $user['qte'] ?></td>
                                                        <td><?= $user['lab_order'] ?></td>
                                                    </tr>   
                                                <?php } ?>                                             
                                            </tbody>
                                        </table>
                                        <p class="userCount"><?= count($users);?> Orders </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
    <script src="scripts/script.js"></script>
    <script src="scripts/jquery/jquery-3.5.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.js" integrity="sha512-AZ+KX5NScHcQKWBfRXlCtb+ckjKYLO1i10faHLPXtGacz34rhXU8KM4t77XXG/Oy9961AeLqB/5o0KTJfy2WiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="scripts/script2.js"></script>
</html>