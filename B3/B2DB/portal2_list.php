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
// Reportar todas las errores PHP en servidor
error_reporting(E_ALL);
//para que aparezcan los errores navegador
ini_set('display_errors', 1);
include("./includedb/gestion_BD.php");
$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
$table1 = "A_actividades";
crearTablaActividades($pdo, $table1);

$action = (array_key_exists('action', $_REQUEST)) ? $_REQUEST["action"] : "home";


switch ($action) {
    case "home":
        $central = "/partials/home.php";
        break;
    case "form_register":
        $central = "/partials/form_register.php";
        break;
    case "registrar":
        include(dirname(__FILE__) . "/includedb/registrar.php");
        $central = "/partials/form_register.php";
        break;
    case "list":
        $central = "/includedb/listar.php";
        break;
    default:
        $central = "/partials/error.php";
}

require_once(dirname(__FILE__) . "/partials/header.php");
require_once(dirname(__FILE__) . "/partials/menu.php");
require_once(dirname(__FILE__) . $central);
echo "<br />", $action, "<br />", dirname(__FILE__), "<br />";
require_once(dirname(__FILE__) . "/partials/footer.php");
