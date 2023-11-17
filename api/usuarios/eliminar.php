<?php
$conx = include "../../includes/conexion.php";
$id = $_POST["id"];
$sql = "DELETE FROM usuarios WHERE id = $id ";
$resultado = mysqli_query($conx, $sql);
if (mysqli_affected_rows($conx) > 0) {
    echo json_encode(array("error" => 0));
} else {
    echo json_encode(array("error" => 1));
}
?>