<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from libro");
    $libro = $sentencia->fetchAll(PDO::FETCH_OBJ);
   // print_r($libro);
?>

<div class="container mt-5">
    <div class="row justify-contetnt-center">
        <div class="col-md-7">
            <!-- alerta -->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error</strong> favor de llenar todos los campos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Registrado</strong>Se agregaron los datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error</strong>Vuelve a intentarlo.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Cambiado</strong>Se actualizaron los datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Eliminado</strong>Los datos fueron eliminados.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <!-- finalalerta -->
            <div class="card">
                <div class="card-header">
                    Lista de libros
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">isbn</th>
                                <th scope="col">titulo</th>
                                <th scope="col">editorial</th>
                                <th scope="col"  colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($libro as $dato){
                                
                            ?>
                            <tr>
                                <td scope="row"><?php echo $dato->codigo;?></td>
                                <td><?php echo $dato->isbn;?></td>
                                <td><?php echo $dato->titulo;?></td>
                                <td><?php echo $dato->editorial;?></td>
                                <td ><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo;?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td ><a class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo;?>"><i class="bi bi-x-square-fill"></i></a></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">ISBN: </label>
                        <input type="number" class="form-control" name="txtIsbn" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Titulo: </label>
                        <input type="text" class="form-control" name="txtTitulo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Editorial: </label>
                        <input type="text" class="form-control" name="txtEditorial" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>