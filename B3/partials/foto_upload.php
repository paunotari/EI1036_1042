<?php

echo "<h2>Contingut de \$_REQUEST:</h2>";
echo '<pre>';
print_r($_REQUEST);
echo '</pre>';

echo "<h2>Contingut de \$_FILES:</h2>";
echo '<pre>';
print_r($_FILES);
echo '</pre>';


$carpeta_destino = dirname(__FILE__) . "/../media/fotos/";
//basename() en PHP sirve para obtener el nombre del archivo (la última parte de una ruta) - no necesario en este caso -> medida seguridad
$nombre_archivo = basename($_FILES["foto_cliente"]["name"]);
$destino = $carpeta_destino . $nombre_archivo;

if (!file_exists($carpeta_destino)) {
    // mkdir -> If true, then any parent directories to the directory specified will also be created, with the same permissions.
    mkdir($carpeta_destino, 0777, true); 
}

//move_uploaded_file (from, to) -> to ->The destination of the moved file. ->BOOL -TRUE IF SUCCESS
if(move_uploaded_file($_FILES["foto_cliente"]["tmp_name"], $destino)){
    echo"<p>Archivo $nombre_archivo movido con exito al directorio $carpeta_destino</p>";
}else{
    $error_msg = "Fallo al guardar archivo en directorio";
}

?>


