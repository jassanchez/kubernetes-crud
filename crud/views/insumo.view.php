<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insumos</title>

    <?php include "bootstrap.html"; ?>

    <script src="js/insumos.js"></script>
</head>
<body>
    <?php include "navbar.html"; ?>

    <div class="container mt-4">
        <div class="row">
            <h3>Insumos</h3>  
            <button type="button" class="btn btn-info ml-auto" data-toggle="modal" 
                data-target="#addInsumo">Nuevo</button> 
        </div>

        <div class="row mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Insumo</th>
                        <th scope="col">Unidad de Medida</th>
                        <th scope="col">Inventario</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($resultInsumos->num_rows > 0){
                        while($row = $resultInsumos->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row" class="align-middle"><?php echo $row["idInsumo"];?></th>
                        <td class="align-middle"><?php echo $row["NombreInsumo"];?></td>
                        <td class="align-middle"><?php echo $row["UnidadMedida"];?></td>
                        <td class="align-middle"><?php echo $row["Cantidad"];?></td>
                        <td class="align-middle">
                            <button type="button" class="btn" name="btnEditar" data-toggle="modal" data-target="#updateInsumo" onClick="asignaIDUpdate(<?php echo $row["idInsumo"];?>);">
                                <i class="fas fa-edit"></i></button> 
                            <button type="button" name="btnBorrar" class="btn" data-toggle="modal" 
                            data-target="#deleteInsumo" onClick="asignaIDBorrar(<?php echo $row["idInsumo"];?>);">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    <?php 
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

<!-- Modal Frame for Delete Insumo -->
        <div class="modal fade" id="deleteInsumo" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Eliminaci&oacute;n de insumo</h5>
                    </div>
                    <div class="modal-body">
                        <h5>¿Est&aacute; seguro de eliminar este Insumo?</h5>
                    </div>
                    <div class="modal-footer">
                        <form action="index.php" method="POST" class="form-group" name="deleteInsumo">
                            <input type="hidden" id="idInsumo" name="idInsumo">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" name="borrarInsumo" class="btn btn-danger">Eliminar</button>   
                        </form> 
                    </div>
                </div>
            </div>
        </div>

<!-- Modal Frame for Update Insumo -->
        <div class="modal fade" id="updateInsumo" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Actualizar Informaci&oacute;n de Insumo</h5>
                    </div>
                    <div class="modal-body">
                        <form action="index.php" method="POST" class="form-group" name="updateInsumo">
                            <input type="hidden" id="idInsumoUpdate" name="idInsumo">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre: </span>
                                </div>
                                <input type="text" name="nombreInsumo" class="form-control" placeholder="Nombre del Insumo" id="nombreInsumoU">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Unidad de Medida: </span>
                                </div>
                                <input type="text" name="UMInsumo" class="form-control" placeholder="Unidad de Medida del Insumo" id="UMInsumoU"> 
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Cantidad: </span>
                                </div>
                                <input type="number" name="CantidadInsumo" class="form-control" placeholder="Cantidad" id="CantidadInsumoU" step="0.01">
                            </div>          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" name="updateInsumo" class="btn btn-info">Actualizar</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>
   
<!-- Modal Frame for Add Insumo -->        
        <div class="modal fade" id="addInsumo" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Agregar Insumo</h5>
                    </div>
                    <div class="modal-body">
                        <form action="index.php" method="POST" class="form-group" name="addInsumo">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre: </span>
                                </div>
                                <input type="text" name="nombreInsumo" class="form-control" placeholder="Nombre del Insumo" aria-label="nombreInsumo" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Unidad de Medida: </span>
                                </div>
                                <input type="text" name="UMInsumo" class="form-control" placeholder="Unidad de Medida del Insumo" aria-label="nombreInsumo" aria-describedby="basic-addon1" step=".01"> 
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Cantidad: </span>
                                </div>
                                <input type="number" name="CantidadInsumo" class="form-control" placeholder="Cantidad" aria-label="nombreInsumo" aria-describedby="basic-addon1">
                            </div>          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" name="altaInsumo" class="btn btn-success">Agregar</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>