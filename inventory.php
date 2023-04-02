<?php
    //Start The Session
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('location: login.php');
    }
    $_SESSION['table'] = 'inventory';
    $user = $_SESSION['user'];
    $users = include('database/select-prod.php');
    
?>
<html>
    <head>
        <title>IMS Login - Inventory Management System</title>
        <link rel="stylesheet" type="text/css" href="css/IMS.css"/>
        <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    </head>
    <body id="dashboard">
        <div id="dashboardMainContainer">
            <?php include('partitials/app-sidebar.php') ?>
            <div id="dashboardContentContainer">
                <?php include('partitials/topnav.php') ?>
                <div class="dashboardContent">
                    <div class="dashboardContentMain">
                        <div class="zzz">
                          
                            <?php foreach($users as $index=> $user){ ?>

                                <div class="products">
                                    <a href="">
                                        <img src="Images/prod/<?= $user['image'] ?>">
                                        <h3><?= $user['lab_prod'] ?></h3>
                                        <p><?= $user['cat'] ?></p>
                                        <p><?= $user['price'] ?> $</p>
                                    </a>    
                                </div>    
                            <?php } ?>                        
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
    <script src="scripts/script.js">
    <script src="scripts/jquery/jquery-3.5.1.min.js"></script>
        
    </script>
</html>