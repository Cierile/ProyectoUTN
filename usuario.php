<?php
include "includes/init.php"; 

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM usuarios WHERE id = $id ";
    $query = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($query) == 0) {
        header("Location: usuarios.php");
    }
    $usuario = mysqli_fetch_array($query);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <?php include "includes/scripts.php" ?>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1 class="titulo">Agregar usuario</h1>
    <?php include "includes/menu.php" ?>
    <form class="agregarUsuario" action="guardar.php" method="POST">    
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" autocomplete="off" value="<?php echo (isset($usuario) ? $usuario["nombre"] : "") ?>">
        </div>
        <div>
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" autocomplete="off" value="<?php echo (isset($usuario) ? $usuario["apellido"] : "") ?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" id="email" autocomplete="off" value="<?php echo (isset($usuario) ? $usuario["email"] : "") ?>">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="text" id="password" autocomplete="off" value="<?php echo (isset($usuario) ? $usuario["password"] : "") ?>">
        </div>
        <button type="submit" onclick="guardar()">Guardar</button>
    </form>
    <script>
        function guardar() {
            var nombre = $("#nombre").val();
            var apellido = $("#apellido").val();
            var email = $("#email").val();
            var password = $("#password").val();
            if (nombre == "") {
                alert("Por favor, ingrese su nombre");
                return;
            }
            $.ajax({
                "url": "api/usuarios/guardar.php",
                "dataType": "json",
                "type": "post",
                "data": {
                    "id": "<?php echo (isset($usuario) ? $usuario["id"] : "0") ?>",
                    "nombre": nombre,
                    "apellido": apellido,
                    "email": email,
                    "password": password, 
                },
                "success": function (json) {
                    if (json.error == 0) {
                        location.href = "usuarios.php";
                    } else {
                        alert("Hubo un error al insertar el nuevo usuario.");
                    }
                }
            })
        }
    </script>
</body>
</html>
