
<?php

session_start();

if(!isset($_SESSION["activo"])){
    $_SESSION["activo"] = 1;
    $_SESSION["usuario"] = "visitante";
    $_SESSION["visita"] = 0;
    // array amb les urls que l’usuari ha consultat. L'URL s’emmagatzema en una clau de $_SERVER[].
    $_SESSION["visitado"] = Array();

    print("<h1>HOLAAA!</h1>");
}else{
    $_SESSION["visita"]=1+$_SESSION["visita"];
    $_SESSION["visitado"] = $_SERVER["HTTP_REFERER"];


    echo "<h1>bienvenido de nuevo ", $_SESSION["usuario"], "!
              Nº visitas: ", $_SESSION["visita"], "
              Pagina anterior: ", $_SESSION["visitado"]," </h1>";
    print_r($_COOKIE);
}


?>