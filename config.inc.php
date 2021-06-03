<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Infraction";
try {
      $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
      die("OOPs something went wrong");
    }

 ?>
