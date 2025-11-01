

<main>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario de Registro</title>
</head>
<body>

  <h2>Formulario de Registro</h2>

  <form action="javascript:console.log(this.fname.value);">  
  
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" required><br><br>


    <label for="email">Correo electrónico:</label><br>
    <input type="email" id="email" name="email" required><br><br>


    <label for="password">Contraseña:</label><br>
    <input type="password" id="password" name="password" minlength="6" required><br><br>


    <label for="edad">Edad:</label><br>
    <input type="number" id="edad" name="edad" min="18" max="100"><br><br>


    <label for="pais">País:</label><br>
    <select id="pais" name="pais">
      <option value="es">España</option>
      <option value="mx">México</option>
      <option value="ar">Argentina</option>
    </select><br><br>


    <label for="comentarios">Comentarios:</label><br>
    <textarea id="comentarios" name="comentarios" rows="4" cols="40"></textarea><br><br>


    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
  </form>

</body>
</html>

</main>