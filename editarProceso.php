<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $isbn = $_POST['txtIsbn'];
    $titulo = $_POST['txtTitulo'];
    $editorial = $_POST['txtEditorial'];

    $sentencia = $bd->prepare("UPDATE libro SET isbn = ?, titulo = ?, editorial = ? where codigo = ?;");
    $resultado = $sentencia->execute([$isbn, $titulo, $editorial, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>