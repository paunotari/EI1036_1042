<?php

//Gestion de errores

//Comprobar que las keys de $_POST existan
if (!isset($_POST['nombre']) || !isset($_POST['id']) || !isset($_POST['plazas'])) {
    $error_msg = "Faltan campos obligatorios";
    $central = "/partials/form_activitat.php";
//Comprobar id cumple formato
}elseif(!preg_match("/^[0-9]{7}[A-Z,Ñ]{1}$/", $_POST['id'])){
    $error_msg="El formato del id es incorrecto";
    $central="/partials/form_activitat.php";
//comprobar si id ES int
//aunque el usuario haya introducido un número, PHP ($_POST) lo recibe como cadena de texto (string), no como int. -> ctype_digit
//ctype_digit -> Checks if all of the characters in the provided string, text, are numerical. Returns true if every character in the string text is a decimal digit 
} elseif (ctype_digit($_POST['plazas']) == false) {
    $error_msg = "El numero de plazas debe ser un numero entero";
    $central = "/partials/form_activitat.php";
} else {

    $nombre = $_POST['nombre'];
    $id = $_POST['id'];
    $plazas = $_POST['plazas'];

    //Diccionario -> id (key), nombre y plazas (values)
    $nueva_actividad = [
        'nombre' => $nombre,
        'plazas' => $plazas
    ];

    $fichero = "actividades.json";

    //Si fichero no existe -> creamos y añadimos actividad,    si existe -> leemos y añadimos
    //Leer json -> decode para pasar a formato php (array de arrays) -> add -> encode -> add into json

    if (!file_exists($fichero)) {
        
        $activitats = [];
        $activitats[$id] = $nueva_actividad;
        //añadir activitats codificat
        file_put_contents($fichero, json_encode($activitats,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    } else {

        //file_get_content() -> devuelve el fichero filename en una cadena
        $json_content = file_get_contents($fichero);
        //Diccionario -> añadir -> ( diccionari decodificat)
        //When true, JSON objects will be returned as associative arrays; when false, JSON objects will be returned as objects.
        $activitats = json_decode($json_content, true); //if not true, error if try to manipulate as an araay

        //Comprobar si id ya está en diccionari
        if (isset($activitats[$id])) {
            $error_msg = "El id de la actividad ya existe";
            $central = "/partials/form_activitat.php";
        } else {
            $activitats[$id] = $nueva_actividad;
            file_put_contents($fichero, json_encode($activitats, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            $central = "/partials/llistat.php";
        }
    }
}

?>