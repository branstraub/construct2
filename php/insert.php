<?php

$servername = "mysqlbran.cloudapp.net";
$username = "bran";
$password = "Ttester!";
$dbname = "farmaciabp79irzf";
$droga = $_GET["droga"];
$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];
$obra_social = $_GET["obra_social"];
$medico = $_GET["medico"];
$farmaceutico = $_GET["farmaceutico"];
$remedio = $_GET["remedio"];
$paciente = $nombre.$apellido;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO `farmaciabp79irzf`.`facturas` (`id_remedio`, `paciente`, `id_dnifarmaceutico`) VALUES (".$remedio.", '".$paciente."', ".$farmaceutico.");";   
    $conn->exec($sql);

    $sql = "INSERT INTO `farmaciabp79irzf`.`receta` (`paciente`, `obra_social`, `medico`, `fecha`, `id_droga`, `id_dnifarmaceutico`) VALUES ('".$paciente."', '".$obra_social."', '".$medico."', Now(), ".$droga.", ".$farmaceutico.");";
    $conn->exec($sql);

    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>

