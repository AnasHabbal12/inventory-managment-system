<?php
    //Start The Session
    session_start();
    if(isset($_SESSION['user']))
    {
        header('location: dashboard.php');
    }
    $errorMassege = '';
    if($_POST)
    {
        include('database/connection.php');
        $_username = $_POST['username'];
        $_password = $_POST['password'];
        $pwd = base64_encode($_password);
        $query = 'SELECT * FROM users WHERE users.email = "'. $_username.'" AND users.password = "'.$pwd.'"';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        
        if($stmt->rowCount()>0)
        {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll()[0];
            $_SESSION['user'] = $user;
            header('Location: dashboard.php');
        }
        else
        {
             $errorMassege = 'Please make sure that username or password are correct.';
        }
       
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>IMS Login - Inventory Management System</title>
        <link rel="stylesheet" type="text/css" href="css/IMS.css"/>
    </head>
    <body id="loginBody">
        <?php
        if(!empty($errorMassege)){ ?>
        <div id="eMessage" >
            <strong>Error : </strong>
            <p><?= $errorMassege?></p>
        </div>
        <?php } ?>
        <div class="container">
            <div class="loginHeader">
                <h1>IMS</h1>
                <p>Inventory Management System</p>
            </div>
            <div class="loginBody">
                <form action="login.php" method="POST">
                    <div class="loginInputContainer">
                        <label for="">USERNAME</label>
                        <input type="text" name="username" placeholder="username"/> 
                    </div>
                    <div class="loginInputContainer">
                        <label for="">PASSWORD</label>
                        <input type="password" name="password" placeholder="password"/> 
                    </div>
                    <div class="loginButtomContainer">
                        <button>Login</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>