<?php
$conx = include "../../includes/conexion.php";
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$password = $_POST["password"];
$id = $_POST["id"];

if ($id == 0) {
    $sql = "INSERT INTO usuarios (nombre, apellido, email, password) VALUES (?, ?, ?, ?)";
} else {
    $sql = "UPDATE usuarios SET nombre = ?, apellido = ?, email = ?, password = ? WHERE id = ?";
}

$stmt = mysqli_prepare($conx, $sql);

if ($stmt) {
    if ($id == 0) {
        mysqli_stmt_bind_param($stmt, "ssss", $nombre, $apellido, $email, $password);
    } else {
        mysqli_stmt_bind_param($stmt, "ssssi", $nombre, $apellido, $email, $password, $id);
    }

    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo json_encode(array("error" => 0));
    } else {
        echo json_encode(array("error" => 1));
    }

    mysqli_stmt_close($stmt);
} else {
    echo json_encode(array("error" => 1));
}
?>