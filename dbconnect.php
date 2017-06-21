<?php
$servername = "localhost";
$username = "root";
$password = "aura123";

//create connection_aborted

$con = new mysqli($servername,$username,$password);

if ($con->connect_error){
	die("connection failed: " . $con->connect_error);
}

?>