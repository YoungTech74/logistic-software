<?php
    include_once './connection.php';
// if(isset($_SESSION['userid'])){
    // unset($_SESSION['userid']);
    session_destroy();

    header('location: ./login.php');
    
// }