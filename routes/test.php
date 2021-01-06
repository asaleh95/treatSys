<?php
$servername = config('database.mysql.host');
$username = config('database.mysql.username');
$password = config('database.mysql.password');
$dbname = config('database.mysql.database');
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "DELETE FROM orders";
$conn->close();
?>