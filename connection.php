<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'logistic_parcel_db');
if(!$conn){
    die(mysqli_error($conn));
}