<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aplikasitoko";

// Create connection
$koneksi = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$koneksi)
{
  die("Connection failed: " . mysqli_connect_error());
}

?> 