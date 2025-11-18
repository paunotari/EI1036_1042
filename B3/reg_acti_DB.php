<?php


// Definir parámetros de la DB
define('DB_HOST', 'localhost');
define('DB_NAME', 'EI1036_42_al394768');
define('DB_USER', 'root');
define('DB_PASSWORD', '');


$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);


//Comprobar si el formulario ha enviado realmente los datos
if(!isset($_POST["login"], $_POST["password"], $_POST["rol"])){
    $error_msg = "Faltan datos del formulario";
    $central = "/partials/form_register.php";
}



$valores = [$_POST["login"], $_POST["password"], $_POST["rol"]];


function insertar($pdo, $table, $valores){
    $query = "INSERT INTO $table (login, passwd, rol) VALUES (?, ?, ?)";
    $consult = $pdo -> prepare($query);
    $a = $consult -> execute($valores);
    if(!$a) echo "Incorrecto";
}



//insertar los valores enviados en el formulario de registro
insertar ($pdo, "usuarios", $valores);


function _H($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// Fer consulta i mostrar valors com una taula html
try {
    $stmt = $pdo->prepare("select * from usuarios where login=?");
    $stmt->execute(array($valores[0]));
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

    $central = "/partials/form_register.php";
    

?>
