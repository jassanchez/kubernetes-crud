function asignaIDBorrar(idInsumo){
    var campoOculto = document.getElementById("idInsumo");
    campoOculto.value = idInsumo;
}

function asignaIDUpdate(idInsumo){
    var campoOculto = document.getElementById("idInsumoUpdate");
    campoOculto.value = idInsumo;

    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var responseInfo = this.responseText.split("@");
            document.getElementById("nombreInsumoU").value = responseInfo[0];
            document.getElementById("UMInsumoU").value = responseInfo[1];
            document.getElementById("CantidadInsumoU").value = responseInfo[2];
        }
      };
      xmlHttp.open("GET", "services/consulta-insumo.php?idInsumo=" + idInsumo, true);
      xmlHttp.send();
}