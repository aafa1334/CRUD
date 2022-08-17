<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd ->prepare("select * from libro where codigo = ?;");
    $sentencia->execute([$codigo]);
    $libro = $sentencia->fetch(PDO::FETCH_OBJ);
    
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">ISBN: </label>
                        <input type="number" class="form-control" name="txtIsbn"  required value="<?php echo $libro->isbn; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Titulo: </label>
                        <input type="text" class="form-control" name="txtTitulo"  required value="<?php echo $libro->titulo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Editorial: </label>
                        <input type="text" class="form-control" name="txtEditorial"  required value="<?php echo $libro->editorial; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $libro->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>