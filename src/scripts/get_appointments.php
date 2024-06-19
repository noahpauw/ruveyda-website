<?php
$host = "https://lashroomdeventer.nl/phpmyadmin/";
$username = "lash_admin";
$password = "fs00Etodsf";
$db = "lash_db";

$conn = mysqli_connect($host, $username, $password, $db);

$query = "SELECT * FROM `appointments`";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    header("Location: /");
}
?>