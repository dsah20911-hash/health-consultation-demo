<?php
$conn = mysqli_connect("localhost", "root", "", "health_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
