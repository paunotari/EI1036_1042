<!DOCTYPE html>
<head>
    <title>Form Act Javascript</title>
    <script type="text/javascript" src="../B4/form_activitat_javascript.js" defer></script>
</head>


<main>

  <h1>Gestión de Actividades </h1>
  <form class="form-activitat" action="?action=reg_acti_withPhoto_javascript" method="POST" enctype="multipart/form-data"> 

    <legend>Datos básicos</legend>


    <label for="nombre">Nombre: </label>
    <input type="text" id ="nombre" name="nombre" required class="item_requerid" size="20" maxlength="25" placeholder="NOMBRE"
      placeholder="Actividad1" />
      <br></br>

    <label for="id">Identificador: </label>
    <input type="text" id="id" name="id" class="item_requerid" size="8" maxlength="8" pattern="[0-9]{7}[A-Z,Ñ]" placeholder="1234567B" required />
    <br></br>

    <label for="plazas">Plazas: </label>
    <input type="int" id="plazas" name="plazas" class="item_requerid" placeholder="Numero de plazas"required>
    <br></br>

    <label for="foto"> Inserta imagen de la actividad: </label>
    <input type="file" id="foto" name="foto_actividad" accept="image/*" required>
    <br></br>

    <input type="submit" value="Enviar">
    <input type="reset" value="Deshacer">
  </form>

<!-- que de primera no se vea, luego de pulsar submit lo hacemos visible, mostrando la imagen enviada y boton de continuar-->
  <div id="display-container" style="display: none;">
      <h3> Vista previa de tu imagen: </h3>
      <img id="preview-img" src="" alt="Imagen porporcionada no visible" style="max-width:300px;"> 
      <button id="continue-button"> Confirmar y enviar</button>
  </div>

</main>

</html>