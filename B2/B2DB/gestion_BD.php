<?php
# http://localhost/phpmyadmin/
# Default user mysql 
# Por defecto sin  password 
# existe una BD creada "test"


// /** The name of the database */
define('DB_NAME', 'test');

// /** MySQL database username */
define('DB_USER', 'mysql');

// /** MySQL database password */
define('DB_PASSWORD', '');

// /** MySQL hostname */
define('DB_HOST', 'localhost');

// /** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

// /** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');




/* Consultas 
 $query = "INSERT INTO    $table (?) VALUES (?,?)";
 $query = "DELETE   FROM   $table WHERE actividad_id =(?)";
 $query = "SELECT     * FROM       $table "; 
  
 */


function crearTablaActividades($pdo, $table)
{

   try {
      //Crea tabla si no existe
      $query = "CREATE TABLE IF NOT EXISTS  $table (
   id SERIAL PRIMARY KEY, 
   nombre CHAR(50) NOT NULL,
   descripcion CHAR(250), 
   localizacion CHAR(50),
   foto_file VARCHAR(50) );";

      $pdo->exec($query);
   } catch (PDOException $e) {
      echo "Failed to get DB handle: " . $e->getMessage() . "\n";
      exit;
   }
}



function consultar($pdo, $table)
{
   $query = "SELECT     * FROM       $table ";
   $consult = $pdo->prepare($query);
   $a = $consult->execute(array());
   if (1 > $a) {
      echo "InCorrectoConsulta";
      echo $table;
   }
   return ($consult->fetchAll(PDO::FETCH_ASSOC));
}

function anyadir($pdo, $table, $campos, $valores)
{
   try {
      $query = "INSERT INTO    $table ($campos) VALUES (?)";
      $consult = $pdo->prepare($query);
      $a = $consult->execute($valores);
      if (1 > $a)
         echo "InCorrecto";
      $datos = consultar($pdo, $table);
   } catch (PDOException $e) {
      echo "Failed to get DB handle: " . $e->getMessage() . "\n";
      exit;
   }
}


