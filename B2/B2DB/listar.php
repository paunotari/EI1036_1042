<?php

function handler($pdo,$table)
{
    
    $rows=consultar($pdo,$table);
    if ($rows==[]) return -1;
    else if (is_array($rows)) {
        
        /* Creamos un listado como una tabla HTML*/
        print '<table><thead>';
        foreach ( array_keys($rows[0])as $key) {
            echo "<th>", $key,"</th>";
        }
        print "</thead>";
        foreach ($rows as $row) {
            print "<tr>";
            foreach ($row as $key => $val) {
                echo "<td>", $val, "</td>";
            }
            print "</tr>";
            
        }
        print "</table>";
        return 0;
        
    }
    else return -2 ;
}


try{
    if (handler($pdo, "A_actividades")!=0) 
    {$data["error"]= 'No hay datos que mostrar';
       }
}
catch (PDOException $e) {
$data["error"]= $e->getMessage();
}

?>