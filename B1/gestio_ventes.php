<?php

# fgetcsv — Gets line from file pointer and parse for CSV fields
# fputcsv — Format line as CSV and write to file pointer
# array_key_exists — Verifica si una clave existe en un array


# Practicar esta solucion con bucles en vez de array_combine
function importar_dades0($fitxer)
{
    $dicc_ventas = [];

    if (($handle = fopen($fitxer, "r")) !== FALSE) {

        // Leer cabeceras
        $capsaleres = fgetcsv($handle);

        // Leer cada fila del CSV
        while (($fila = fgetcsv($handle, 1000, ",")) !== FALSE) {

            $sale = [];

            // Recorremos cada columna usando foreach con índice
            foreach ($capsaleres as $i => $clave) {
                $sale[$clave] = $fila[$i];  // asociamos cabecera -> valor correspondiente
            }

            $dicc_ventas[] = $sale;
        }

        fclose($handle);
    }

    return $dicc_ventas;
}


function compra_clients($dicc_ventas, $clientID)
{
    $productes = [];

    // passem el client a minúscules
    $clientID = strtolower($clientID);

    foreach ($dicc_ventas as $venda) {
        // també passem a minúscules l'ID del registre abans de comparar
        if (strtolower($venda['Cust_ID']) === $clientID) {
            $productes[] = $venda['product'];
        }
    }

    return $productes;
}

function guardar_dades($dicc_ventas, $nom_fitxer)
{
    // Convert the array to JSON text
    $jsonData = json_encode($dicc_ventas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // Save JSON text into a file
    file_put_contents($nom_fitxer, $jsonData);
}


function afegeix_compra(
    &$dicc_ventas,   // Array principal de vendes, passat per referència
    $productx,
    $countryx,
    $datex,
    $quantityx,
    $amountx,
    $cardx,
    $Cust_IDx
) {

    // Creem la nova venda com un array associatiu
    $nova_venda = [
        "producte" => $productx,
        "country"  => $countryx,
        "date"     => $datex,
        "quantity" => $quantityx,
        "amount"   => $amountx,
        "card"     => $cardx,
        "Cust_ID"  => $Cust_IDx
    ];

    // Afegim la nova venda al diccionari principal
    $dicc_ventas[] = $nova_venda;
}


function borrar_compra($dicc_ventas, $Cust_ID, $product, $date)
{

    $Cust_ID = strtolower($Cust_ID);
    $product = strtolower($product);

    foreach ($dicc_ventas as $i => $venda) {
        if (
            strtolower($venda["Cust_ID"]) === $Cust_ID &&
            strtolower($venda["product"]) === $product &&
            $venda["date"] === $date
        ) {

            unset($dicc_ventas[$i]); // Cuando eliminas un elemento con unset, queda un hueco 
            $dicc_ventas = array_values($dicc_ventas); // si luego recorres el array esperando índices contiguos. array_values “compacta” la lista.
            return true;
        }
        return false;
    }
}











// Exemple Test

// Test exercise 1
$dicc_ventas = importar_dades0("./B1/sales_2008-2011.csv");

// Test exercise 2
$llista_prod_clients = compra_clients($dicc_ventas, "Cust_4");
print_r($llista_prod_clients);

// Test exercise 3
guardar_dades($dicc_ventas, "ventas.json");
echo "JSON file has been created successfully!\n";

// Test exercisi 4
afegeix_compra(
    $dicc_ventas,
    "Ordinador",
    "Spain",
    "2025-09-22",
    1,
    600,
    "Y",
    "Cust_1"
);
echo "Sell added to dicctionary successfully!";
print_r($dicc_ventas);

// Test exercisi 5
borrar_compra($dicc_ventas, "Cust_8", "prod_4", 2008 - 12 - 12);
echo "compra borrada!\n";
print_r($dicc_ventas);
