function mostrarImagen(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var preview = document.getElementById("preview");
            preview.src = e.target.result;
            preview.style.display = "block";
        };
        reader.readAsDataURL(input.files[0]);
    }
}

var enviarBtns = document.querySelectorAll(".eliminar-alert");
enviarBtns.forEach(function (enviarBtn) {
    enviarBtn.addEventListener("click", function (event) {
        event.preventDefault();

        var eliminarImagen = function () {
            this.submit();
        };

        Swal.fire({
            title: "¿Está seguro?",
            text: "¡Se eliminará definitivamente!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, ¡Eliminar!",
        }).then((result) => {
            if (result.isConfirmed) {
                enviarBtn.removeEventListener("click", eliminarImagen);
                eliminarImagen.call(enviarBtn);
            }
        });
    });
});

function actualizarCosto() {
    var costoPaquete = 0;
    var paqueteSeleccionado = document.querySelector(
        'select[name="paquete_id"] option:checked'
    );
    console.log(paqueteSeleccionado);
    if (paqueteSeleccionado && paqueteSeleccionado.value != "Seleccionar") {
        costoPaquete = parseFloat(paqueteSeleccionado.dataset.costo);
    } else {
        costoPaquete = 0;
    }

    var costoServicios = 0;
    var serviciosSeleccionados = document.querySelectorAll(
        "input.servicio:checked"
    );
    serviciosSeleccionados.forEach(function (servicioSeleccionado) {
        costoServicios += parseFloat(servicioSeleccionado.dataset.costo);
    });

    var costoTotal = costoPaquete + costoServicios;
    var costo = document.getElementById("costo-total").innerText;
    document.getElementById("costo").value = costoTotal;

    document.getElementById("costo-total").textContent = costoTotal;
}
<<<<<<< HEAD

function paquete_required(e){

    let paquete = document.getElementById('opcion').value;
    let error = document.getElementById('error');
    if(paquete == "Seleccionar"){ 
        e.preventDefault();
        error.textContent = "Necesitas seleccionar un paquete"

    }else{
        error.textContent = ""
    }
    



}



=======
>>>>>>> 80a6cf0aa75449036c1a7f71b7e63c120976fdce
