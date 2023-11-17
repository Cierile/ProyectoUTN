<?php include "includes/init.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <?php include "includes/scripts.php" ?>;
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1 class="titulo">Usuarios</h1>
    <?php include "includes/menu.php"?>
    <div class="col-6">
      <a button type="button" class="btn btn-success" href="usuario.php">+ Agregar usuario</a>
    </div>
      <div class="container mt-4">
       <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM usuarios";
            $resultado = mysqli_query($conexion, $sql);
            while ($fila = mysqli_fetch_array($resultado)) { ?>
                <tr>
                    <td><?php echo $fila["nombre"] ?></td>
                    <td><?php echo $fila["apellido"] ?></td>
                    <td><?php echo $fila["email"] ?></td>
                    <td>
                        <a href="usuario.php?id=<?php echo $fila["id"] ?>" class="btn btn-primary btn-sm">Editar</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="eliminar(<?php echo $fila["id"] ?>)" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
function eliminar(id) {
  if(!confirm("¿Desea realmente eliminar el elemento?")) return;
    $.ajax({
    "url":"api/usuarios/eliminar.php",
    "dataType":"json",
    "type":"post",
    "data":{
      "id": id
    },
    "success":function(resultado) {
      if (resultado.error == 0) {
        location.reload();
      } else {
        alert("Error al eliminar el elemento");
      }
    }, 
  });
}
</script>
</body>
</html>