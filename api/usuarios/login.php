<?php
SESSION_START();
$email = $_POST["email"];
$password = $_POST["password"];

$conexion = include "../../includes/conexion.php";
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM usuarios WHERE email = ? AND password = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$stmt->store_result();
$cantidadRegistros = $stmt->num_rows;
$stmt->close();
if ($cantidadRegistros == 0) {
    echo json_encode(array(
        "error" => 1
    ));
} else {
    $_SESSION["email"] = $email;
    echo json_encode(array(
        "error" => 0
    ));
}
$conexion->close();
?>