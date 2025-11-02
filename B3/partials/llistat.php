<br></br>
<H1>FORMULARIO COMPLETADO</H1>
<br></br>
<H1>ACTIVIDADES LISTADAS</H1>


<?php 
$file = "actividades_con_foto.json";
$actividades = json_decode(file_get_contents($file),true);
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>PLAZAS</th>
            <th>FOTO</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($actividades as $id => $actividad): ?> <!-- --$id → la clave, $actividad → el valor asociado a esa clave-->
            <tr>
                <td> <?= $id ?> </td>
                <td> <?= $actividad['nombre'] ?> </td>
                <td> <?= $actividad['plazas'] ?> </td>
                <td> <img src= "<?=$actividad['img_URL']?>" alt="Imagen no visualizada" width="200"> </td>
            </tr>
        <?php endforeach; ?>
        
    </tbody>
</table>