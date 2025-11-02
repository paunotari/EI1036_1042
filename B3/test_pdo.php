<?php


// Definir parámetros de la DB
define('DB_HOST', 'localhost');
define('DB_NAME', 'EI1036_42_al394768');
define('DB_USER', 'root');
define('DB_PASSWORD', '');



$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

function insertar($pdo, $table, $valor){
    $query = "INSERT INTO $table (nombre) VALUES (?)";
    $consult = $pdo -> prepare($query);
    $a = $consult -> execute(array($valor));
    if(1>$a) echo "Incorrecto";
}

function _H($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}


try {
    $stmt = $pdo->prepare("select * from usuarios where id=?");
    $stmt->execute(array($ID));
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
