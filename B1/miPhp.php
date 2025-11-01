<?php
// miPhp.php

// 2. Crear llista dels dies de la setmana
$dias = ["Dilluns", "Dimarts", "Dimecres", "Dijous", "Divendres", "Dissabte", "Diumenge"];

// 3. Mostrar dies amb print, print_r i var_dump
echo "<p>Mostrat amb print:</p>";
print($dias[0] . ", " . $dias[1] . ", " . $dias[2] . ", " . $dias[3] . ", " . $dias[4] . ", " . $dias[5] . ", " . $dias[6] . ". <br>");

echo "<p>Mostrat amb print_r:</p>";
print_r($dias);
echo "<br>";

echo "<p>Mostrat amb var_dump:</p>";
var_dump($dias);
echo "<br>";

// Diferència:
// - print: només mostra strings, no interpreta arrays directament, cal accedir a cada element.
// - print_r: mostra arrays i objectes de manera llegible.
// - var_dump: mostra arrays i objectes amb tipus i longitud de cada element.

// 5. Mostrar posició i dia amb bucles

echo "<p>Mostrat amb for:</p>";
for ($i = 0; $i < count($dias); $i++) {
    echo "Posició $i: " . $dias[$i] . "<br>";
}

echo "<p>Mostrat amb foreach:</p>";
foreach ($dias as $pos => $dia) {
    echo "Posició $pos: $dia<br>";
}

echo "<p>Mostrat amb while:</p>";
$i = 0;
while ($i < count($dias)) {
    echo "Posició $i: " . $dias[$i] . "<br>";
    $i++;
}

// Funcions amb diferents tipus de bucles
function mostrar_for($dias)
{
    for ($i = 0; $i < count($dias); $i++) {
        echo "Posició $i: " . $dias[$i] . "<br>";
    }
}

function mostrar_foreach($dias)
{
    foreach ($dias as $pos => $dia) {
        echo "Posició $pos: $dia<br>";
    }
}

function mostrar_while($dias)
{
    $i = 0;
    while ($i < count($dias)) {
        echo "Posició $i: " . $dias[$i] . "<br>";
        $i++;
    }
}

// Funció que comprova si una cadena és un dia de la setmana
function es_cadena_dia($cadena)
{
    global $dias; // Accedim a l'array de dies de la setmana
    $cadena = mb_strtolower($cadena); // Passar a minúscules
    foreach ($dias as $dia) {
        if (mb_strtolower($dia) === $cadena) {
            return true;
        }
    }
    return false;
}


// Exemple d'ús de la funció es_cadena_dia
$prova = "dilluns";
if (es_cadena_dia($prova)) {
    echo "<p>$prova és un dia de la setmana</p>";
} else {
    echo "<p>$prova NO és un dia de la setmana</p>";
}
