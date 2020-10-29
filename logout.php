<?php
    session_start();
    session_destroy();
    setcookie('email',"",time()-1);
    setcookie('password',"",time()-1);
    header('location:login.php');
    exit;
?>
