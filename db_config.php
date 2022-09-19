<?php
$conn = new mysqli("localhost", "root", "", "todo");

if($conn->connect_error){
    die($conn->connect_error);
}


?>