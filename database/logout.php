<?php
    session_start();
    // remove all session variables
    session_unset();
    // Session distroy
    session_destroy();

    header('location: ../login.php');
 ?>