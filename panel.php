<?php include "includes/init.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mi Panel</title>
        <?php include "includes/scripts.php" ?>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1 class="titulo">Mi Panel</h1>
        <div class="saludo">¡Hola, <?php echo $_SESSION["email"] ?>! </div>
        <?php include "includes/menu.php"?>
    </body>
</html>