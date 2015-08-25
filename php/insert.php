<?php

$servername = "br-cdbr-azure-south-a.cloudapp.net";
$username = "bf67ac9f0ad34b";
$password = "8174d34f";
$dbname = "acsm_f65787f5fabf0d3";

$nombre = $_GET["nombre"];
$puntos = $_GET["puntos"];


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO `acsm_f65787f5fabf0d3`.`puntajes` (`nombre_user`, `puntuacion`) VALUES (".$nombre.", '".$puntos."');";   
    $conn->exec($sql);

    echo "Puntaje cargado correctamente";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>

