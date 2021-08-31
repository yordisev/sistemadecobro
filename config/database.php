
<?php

$conn = new mysqli('localhost', 'root', '', 'prestamos_db');

if($conn->connect_error){
	echo $error -> $conn->connect_error;
}

?>