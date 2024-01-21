<?php
$server = "localhost";
$username = "Lakpa";
$password = "Sherpa@1123";
$database = "signup";


$connection = mysqli_connect("$server", "$username", "$password", "$database");



if (!$connection) {
    die(mysqli_connect_error());
}
