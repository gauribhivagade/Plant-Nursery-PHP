<?php

$host ="sql205.infinityfree.com";
$username = "if0_42887029";
$password = "WoWjhrd9aL";
$database = "if0_42887029_plantnurseryy";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Database connection failed.");
}

mysqli_set_charset($conn, "utf8mb4");

?>