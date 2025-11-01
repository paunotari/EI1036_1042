<?php

/**
 * * Descripción: Controlador principal
 * *
 * * Descripción extensa: Iremos añadiendo cosas complejas en PHP.
 * *
 * * @author  Lola <dllido@uji.es> <fulanito@example.com>
 * * @copyright 2018 Lola
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 2
 * * Si la URL tiene este esquema http://xxxx/portal0?action=fregistro
 * * mostrara el formulario de registro. Si no hay nada la página principal.
 **/



ini_set('display_errors', 1); //mode depurador de programes

// Comprovem si hi ha action, y si la petició ve del nostre portal -> denegar access
if (isset($_GET['action']) && (!isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']) === false)) {
    $error_msg = "Acceso directo no permitido";
    $central = "home.php";
} else {
    // Si sí que ve del portal, continua normal

    //Important: session_start() ha d’executar-se abans de qualsevol sortida HTML, és a dir, abans que s’imprimeixi cap <html>, <head>, o echo.
    require_once(dirname(__FILE__) . "/partials/sessions.php");

    $action = (array_key_exists('action', $_REQUEST)) ? $_REQUEST["action"] : "home";


    switch ($action) {
        case "home":
            $central = "/partials/home.php";
            break;
        case "form_register":
            $central = "/partials/form_register.php";
            break;
        // Añadido para que el link a qui_som del menú que es carrega en portal0, carregue ccorrectament el link
        case "qui_som":
            $central = "/partials/qui_som.php";
            break;
        // Añadido
        case "privacy":
            $central = "/partials/igpd.php";
            break;
        //Añadido 
        case "noticias":
            $central = "/partials/noticias.php";
            break;
        //Añadido
        case "galeria":
            $central = "/partials/galeria.php";
            break;
        //Añadido
        case "llistar_acti":
            $central = "/partials/llistat.php";
            break;
            
        //Añadido
        case "form_activitat":
            $central = "/partials/form_activitat.php";
            break;
        //Añadido B3  -> require once logica php del forma activitat
        case "reg_acti":
            require_once(dirname(__FILE__) . "/partials/reg_acti.php"); // Se ejecuta al momento
            break;
        //Añadido B3, para el reg_acti_withPhoto
        case "reg_acti_withPhoto":
            require_once(dirname(__FILE__) . "/partials/reg_acti_withPhoto.php"); // Se ejecuta al momento
            break;


        //Añadido B3
        case "form_foto":
            $central = "/partials/form_foto.php";
            break;
        //Lógica php del form foto
        case "foto_upload":
            $central = "/partials/foto_upload.php";
            break;

        //


        //Modificado practica B3
        default:
            $error_msg = "Acción no permitida";
            $central = '/home.php';
    }
}


//Este archivo contiene el <head> completo y el <header> visual.
//Al ejecutarse primero, el navegador carga tu CSS (estilo0.css) y cualquier otra cosa que hayas enlazado (favicon, Google Fonts, etc.).
//Todoo lo que se cargue después de esto hereda esos estilos, incluso los <main> y <aside> de las páginas que incluyes dinámicamente.
require_once(dirname(__FILE__) . "/partials/header.php");

require_once(dirname(__FILE__) . "/partials/menu.php");

//Añadido B3
if (isset($error_msg)) require_once(dirname(__FILE__) . "/partials/error.php");


//Añadido - En esta posición especifica, después de header y menú, para que aparezca en medio de la web
require_once(dirname(__FILE__) . "/partials/noticias.php");

require_once(dirname(__FILE__) . $central);
echo "<br />", $action, "<br />", dirname(__FILE__), "<br />";
require_once(dirname(__FILE__) . "/partials/footer.php");
