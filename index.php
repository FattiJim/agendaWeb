<?php
include("class/sql.php");
include("class/agenda2023.php");

$agenda = new agenda2023();
$tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : "";


if($tipo == 1){
    $nom = isset($_GET["nom"]) ? $_GET["nom"] : "";
    $app = isset($_GET["app"]) ? $_GET["app"] : "";
    $tel = isset($_GET["tel"]) ? $_GET["tel"] : "";
    $llave = isset($_GET["llave"]) ? $_GET["llave"] : "";
    $result = $agenda->agregar($nom, $app, $tel, $llave);
    echo $result;
}
if($tipo == 2){
    $nom = isset($_GET["nom"]) ? $_GET["nom"] : "";
    $app = isset($_GET["app"]) ? $_GET["app"] : "";
    $tel = isset($_GET["tel"]) ? $_GET["tel"] : "";
    $llave = isset($_GET["llave"]) ? $_GET["llave"] : "";
    $result = $agenda->update($nom, $app, $tel, $llave);
    echo $result;
}
if($tipo == 3){
    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    $llave = isset($_GET["llave"]) ? $_GET["llave"] : "";
    $result = $agenda->delete($id, $llave);
    echo $result;
}
if($tipo == 4){
    $llave = isset($_GET["llave"]) ? $_GET["llave"] : "";
    $result = $agenda->consultar($llave);
    echo $result;
}
if($tipo == 5){
    $anuncio = "No se puede ejecutar esta instruccion";
    echo $anuncio;

}
?>