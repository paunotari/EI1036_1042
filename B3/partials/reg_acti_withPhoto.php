
<?php

//Gestion de errores
if (!isset($_POST['nombre']) || !isset($_POST['id']) || !isset($_POST['plazas']) || !isset($_FILES['foto_actividad'])) {
    $error_msg = "Faltan campos obligatorios";
    $central = "/partials/form_activitat.php";
} elseif (!preg_match("/^[0-9]{7}[A-Z,Ñ]{1}?/", $_POST['id'])) {
    $error_msg = "El id no sigue el formato indicado (7 num, 1 letra mayúscula)";
    $central = "/partials/form_activitat.php";
} elseif (!ctype_digit($_POST['plazas'])) {
    $error_msg = "El numero de plazas debe ser un numero entero";
    $central = "/partials/form_activitat.php";
} else {

    $nombre = $_POST['nombre'];
    $id = $_POST['id'];
    $plazas = (int) $_POST['plazas']; //Ya he comprobado previamente que el str era int, lo paso a int


    $fichero = "actividades_con_foto.json";

    //Dirección de la foto para almacenarla
    $carpeta_destino = dirname(__FILE__) . "/../media/fotos_reg_acti/";
    $nombre_archivo = basename($_FILES["foto_actividad"]["name"]);
    $destino_img_absoluta = $carpeta_destino . $nombre_archivo;
    $destino_img_relativa = "media/fotos_reg_acti/" . $nombre_archivo;

    $nueva_actividad = [
        'nombre' => $nombre,
        'plazas' => $plazas,
        'img_URL' => $destino_img_relativa //ruta RELATIVA img -> <img src="..." alt="..."> -> necesitar ruta relativa
    ];


    if (file_exists($fichero)) {
        $actividades = json_decode(file_get_contents($fichero), true); //decode -> true -> JSON objects will be returned as associative arrays
    }

    if (isset($actividades[$id])) {
        $error_msg = "El id de actividad ya existe";
        $central = "/partials/form_activitat.php";
    }

    //Store image in folder
    if (!store_img($carpeta_destino, $destino_img_absoluta)) {
        $error_msg = "Error al almacenar la imagen";
        $central = "/partials/form_activitat.php";
    }

    //Store actividad in json 
    $actividades[$id] = $nueva_actividad; //Recorda, diccionari [$id]
    file_put_contents($fichero, json_encode($actividades, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE));
    $central = "/partials/llistat.php";
}




//move_uploaded_file() necesita ruta absoluta, pero al mostrar la img en html -> <img src="..." alt="..."> -> necesitar ruta relativa para poder abrirse en navegador
//por eso almacenamos ruta_relativa, y no
function store_img($carpeta_destino, $destino_img_absoluta)
{
    if (!file_exists($carpeta_destino)) {
        mkdir($carpeta_destino, 0777, true);
    }
    if (move_uploaded_file($_FILES["foto_actividad"]["tmp_name"], $destino_img_absoluta)) { //from (tmp route form) - to (ruta destino incluyendo nombre archivo)
        return true;
    } else {
        return false;
    }
}


?>