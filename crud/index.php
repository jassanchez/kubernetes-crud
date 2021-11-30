<?php
    session_start();
    include("database/connection.php");

    if(isset($_POST['borrarInsumo'])){
        $sqlBorraInsumo = "DELETE FROM Insumo WHERE idInsumo=".$_POST["idInsumo"];

        if ($conn->query($sqlBorraInsumo) === TRUE) {
            echo "Eliminacion de Insumo Correcta";
        } else {
            echo "Error: " . $sqlBorraInsumo . "<br>" . $conn->error;
        }     
    }

    if(isset($_POST['altaInsumo'])){
        $sqlAltaInsumo = "INSERT INTO Insumo (NombreInsumo, UnidadMedida, Cantidad)
        VALUES ('".$_POST["nombreInsumo"]."', '".$_POST["UMInsumo"]."',".$_POST["CantidadInsumo"]." )";

        if ($conn->query($sqlAltaInsumo) === TRUE) {
            echo "Alta de Insumo Correcta";
        } else {
            echo "Error: " . $sqlAltaInsumo . "<br>" . $conn->error;
        }
    }

    if(isset($_POST['updateInsumo'])){
        $sqlUpdateInsumo = "UPDATE Insumo SET NombreInsumo='".$_POST["nombreInsumo"].
                                "',UnidadMedida='".$_POST["UMInsumo"].
                                "',Cantidad=".$_POST["CantidadInsumo"]." 
                                where idInsumo=".$_POST["idInsumo"];

        if ($conn->query($sqlUpdateInsumo) === TRUE) {
            echo "Actualizacion de Insumo Correcta";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } 
    }

    $sqlConsultaInsumos = "select * from Insumo";
    $resultInsumos= $conn->query($sqlConsultaInsumos);

    require("views/insumo.view.php");
?>
