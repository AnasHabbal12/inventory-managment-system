<?php
    //Start The Session
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('location: login.php');
    }
    $user = $_SESSION['user'];
    
?>
<!DOCTYPE html>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="scripts/script.js">
        
    </script>
</html>