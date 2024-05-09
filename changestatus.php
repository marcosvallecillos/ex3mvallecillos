<?php
require_once 'autoloader.php';
$cambiarimagen= new lighting;
$cambiarimagen->cambiarImagen();


if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"],$_GET["encendida"])) {
    $task_id = $_GET["id"];

    $task = $cambiarimagen->encotrarID($lamp_id);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $encendida = $_POST["encendida"];
    $modelo = $_POST["modelo"];
    $potencia = $_POST["potencia"];
    $zona = $_POST["zona"];
    $lamp->updateTarea($id, $nombre, $modelo,$encendida, $potencia,$zona);

    header("Location: index.php");
    exit(); 
}