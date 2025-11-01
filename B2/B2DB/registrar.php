<?php

function handler($pdo,$table)
{
    
    $datos = $_REQUEST;
    if (count($_REQUEST) < 2) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO     $table (nombre, descripcion)
                        VALUES (?,?)";
    try { 
        $a=array($_REQUEST['nombre'], $_REQUEST['correo'] );
        $consult = $pdo->prepare($query);
        $a=$consult->execute(array($_REQUEST['nombre'], $_REQUEST['correo'] ));
        if (1>$a) $data["error"]="InCorrecto";
    
    } catch (PDOExeption $e) {
        echo "error BD";
        echo $e;
    }
}
handler( $pdo, "A_actividades");
?>