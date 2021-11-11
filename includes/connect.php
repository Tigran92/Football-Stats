<?php

$servername = "igor.gold.ac.uk";
$username = "tgrig001";
$password = "Tikomysql";

// Create connection
$connection = mysqli_connect('localhost', $username, $password);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_error($connection));
}
if($connection){
#echo "Connected successfully";
}
$select_db = mysqli_select_db($connection,'tgrig001_footballstats');
if (!$select_db){
  die("Database selection failed" .mysqli_error($connection));
}
if($select_db){
#echo " selected db";
}


?>

