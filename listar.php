<?php

include("config/database.php");

$query = "SELECT * FROM db_usuarios_cobrar WHERE estado='Inactivo'";
$resultado = mysqli_query($conn, $query);

if (!$resultado) {
	die("error");
} else {
	while ($data = mysqli_fetch_assoc($resultado)) {
		$arreglo["data"][] = $data;
	}

	echo json_encode($arreglo);
}

mysqli_free_result($resultado);
mysqli_close($conn);
