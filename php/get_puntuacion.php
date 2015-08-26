<?php

$servername = "br-cdbr-azure-south-a.cloudapp.net";
$username = "bf67ac9f0ad34b";
$password = "8174d34f";
$dbname = "acsm_f65787f5fabf0d3";
$tabla = $_GET["tabla"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT * FROM ".$tabla." order by puntajes.puntuacion desc" );
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    $json=json_encode($result);
    echo $json;
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>