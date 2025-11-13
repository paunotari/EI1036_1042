<?php


// Definir parámetros de la DB
define('DB_HOST', 'localhost');
define('DB_NAME', 'EI1036_42_al394768');
define('DB_USER', 'root');
define('DB_PASSWORD', '');



$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

function insertar($pdo, $table, $valores){
    $query = "INSERT INTO $table VALUES (?)";
    $consult = $pdo -> prepare($query);
    $a = $consult -> execute($valores);
    if(1>$a) echo "Incorrecto";
}

$valores = [$_REQUEST["login"], $_REQUEST["password"], $_REQUEST["rol"]];

//insertar los valores enviados en el formulario de registro
insertar ($pdo, "usuarios", $valores);


function _H($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// Fer consulta i mostrar valors com una taula html
try {
    $stmt = $pdo->prepare("select * from usuarios where login=?");
    $stmt->execute(array($_REQUEST["login"]));
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    print "<table>";
    foreach($rows as  $row) {
        print"<tr>";
          foreach($row as  $key=>$val) {
              print"<td>"._H($key).":"._H($val)."</td>";}
          print"</tr>";}
    print "</table>";
    

?>
