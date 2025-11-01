
<?php

session_start();

print("<h1>INICIO DE SESIÓN</h1>");
if(!isset($_SESSION["activo"])){
    $_SESSION["activo"] = 1;
    $_SESSION["usuario"] = "visitante";
    $_SESSION["visita"] = 0;
    print("<h1>HOLAAA!</h1>");
}else{
    echo "<h1>bienvenido de nuevo ", $_SESSION["usuario"], "!</h1>";
    $_SESSION["visita"]=1+$_SESSION["visita"];


}


?>