<?php

include ('./db_config.php');

    $id=$_GET['id'];
    
    $sql="DELETE FROM todo_list WHERE id=$id";
    $conn->query($sql);
    header('location:./index.php');
    
    
?>