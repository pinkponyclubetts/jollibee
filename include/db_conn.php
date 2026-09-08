<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "jollibee";

$conn = mysqli_connect($servername, $username, $password, $databasename);

if(!$conn) {
    die("Error has occured: " . mysqli_connect_error());
}

//echo "Successfully Connected!";

?>