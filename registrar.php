<?php
   // print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtIsbn"]) || empty($_POST["txtTitulo"]) || empty($_POST["txtEditorial"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }
    include_once'model/conexion.php';
    $isbn = $_POST["txtIsbn"];
    $titulo = $_POST["txtTitulo"];
    $editorial = $_POST["txtEditorial"];

    $sentencia = $bd ->prepare("INSERT INTO libro(isbn,titulo,editorial)VALUES(?,?,?);");
    $resultado = $sentencia-> execute([$isbn,$titulo,$editorial]);

    if ($resultado === TRUE ) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
