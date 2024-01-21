<?php
$city = $_GET['city']; // Obtém o nome da cidade da consulta

$imageDirectory = "images/$city/";

$imageUrls = array();

if (is_dir($imageDirectory)) {
    $images = scandir($imageDirectory);

    foreach ($images as $image) {
        if ($image !== '.' && $image !== '..') {
            $imageUrls[] = "$imageDirectory$image";
        }
    }
}

header('Content-Type: application/json'); // Define o cabeçalho para indicar que o conteúdo é JSON
echo json_encode(array("city" => $city, "urls" => $imageUrls));
?>