<?php
include "dbcon.php";
 if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $delete_command = "DELETE FROM postingdetails WHERE id = $id";

    $delete_query = mysqli_query($connection, $delete_command);


    if ($delete_query) {
        header("location:homepage.php");
    }
 }


?>