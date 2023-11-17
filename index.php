<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LC - Iniciar sesión</title>
    <?php include "includes/scripts.php" ?>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1 align="center">¡Bienvenido!</h1>
    <div id="inputForm">
      <form id="formulario">
        <input type="text" id="email" name="email" placeholder="Tu email" autocomplete="email" required style="background-color: rgba(158, 195, 204, 0.89);"><br>
        <input type="password" id="password" name="password" placeholder="Tu contraseña" autocomplete="current-password" required style="background-color: rgba(158, 195, 204, 0.89);"><br>  
        <button onclick="enviar_login()" style="background-color: rgb(154, 184, 204);">Ingresar</button>
    </form>
    </div>
<script>
function enviar_login() {
  var email = $("#email").val();
  var password = $("#password").val();
  if (email == "") {
    alert("Por favor, ingresá un email");
    return;
  }
  if (password == "") {
    alert("Por favor, ingresá una contraseña");
    return;
  }
  $.ajax({
    "url":"api/usuarios/login.php",
    "dataType":"json",
    "type":"post",
    "data":{
      "email":email,
      "password":password,
    },
    "success":function(resultado) {
      if (resultado.error == 0) {
      location.href = "panel.php";
      } else {
        alert("Usuario o contraseña incorrectos");
      }
    },
    "error": function (jqXHR, textStatus, errorThrown) {
        console.log("Error en la solicitud AJAX:", textStatus, errorThrown);
        alert("Error en la comunicación con el servidor. Por favor, inténtalo de nuevo.");
    }
  });
}
</script>
</body>
</html>
