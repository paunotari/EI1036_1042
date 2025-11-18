

<main>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario de Registro</title>
</head>
<body>

  <h2>Formulario de Registro</h2>

  <form action="?action=reg_acti_DB" method="POST">  
  
    <label for="login">Login:</label><br>
    <input type="text" id="login" name="login" required><br><br>


    <label for="password">Pasword:</label><br>
    <input type="password" id="password" name="password" minlength="6" required><br><br>


    <label for="rol">Rol:</label><br>
    <input type="text" id="rol" name="rol" required><br><br>


    
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
  </form>

</body>
</html>

</main>