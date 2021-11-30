<?php
    include("../database/connection.php");

    $sqlConsultaInsumo = "select * from Insumo where idInsumo=".$_GET["idInsumo"];
    $resultInsumos= $conn->query($sqlConsultaInsumo);

    while($row = $resultInsumos->fetch_assoc()){
        echo $row["NombreInsumo"]."@".$row["UnidadMedida"]."@".$row["Cantidad"];
    }
?>