$(document).ready(function() {
    $('#usuarios').DataTable({
        responsive: true,
        autoWidth: false,

        "language": {
            "lengthMenu": "Mostrar " + 
                         `<select class="custon-select custom-select-sm form-control form-control-sm"> 
                             <option value="10">10</option>
                             <option value="25">25</option>
                             <option value="50">50</option>
                             <option value="100">100</option>
                             <option value="-1">Todos</option>
                         </select>`
                        +" registros por página",
            "zeroRecords": "Nada encontrado - lo sentimos",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
});

function mostrarImagen(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var preview = document.getElementById('preview');
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}

var enviarBtns = document.querySelectorAll('.eliminar-alert');
enviarBtns.forEach(function(enviarBtn) {
    enviarBtn.addEventListener('click', function(event) {
        event.preventDefault();

        var eliminarImagen = function() {
            this.submit();
        }

        Swal.fire({
            title: '¿Está seguro?',
            text: "¡Se eliminará definitivamente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, ¡Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                enviarBtn.removeEventListener('click', eliminarImagen);
                eliminarImagen.call(enviarBtn);
            }
        })
    });
});


 function actualizarCosto() {
    
            var costoPaquete = 0;
            var paqueteSeleccionado = document.querySelector('select[name="paquete_id"] option:checked');
            console.log(paqueteSeleccionado);
            if (paqueteSeleccionado && paqueteSeleccionado.value!="Seleccionar") {
                costoPaquete = parseFloat(paqueteSeleccionado.dataset.costo);
            }else{
                costoPaquete = 0;
            }

            var costoServicios = 0;
            var serviciosSeleccionados = document.querySelectorAll('input.servicio:checked');
            serviciosSeleccionados.forEach(function(servicioSeleccionado) {
                costoServicios += parseFloat(servicioSeleccionado.dataset.costo);
            });

            var costoTotal = costoPaquete + costoServicios;
            var costo = document.getElementById("costo-total").innerText;
            document.getElementById("costo").value = costoTotal;
           
            document.getElementById('costo-total').textContent = costoTotal;            
        }

//Si no selecciona ningun paquete manda error 
document.getElementById("botonGE").onclick = function (event){

    var opcion = document.getElementById("opcion").value;
    var todoInput = document.querySelectorAll('.validar');
    var todolabel = document.querySelectorAll('.validarLabel');

  
    for (let i = 0; i < todoInput.length; i++) {

       
        todoInput[i].addEventListener('blur', function(){
            if(todoInput[i].value == ""){
                event.preventDefault();
                todoInput[i].style.borderColor = "red";
                todolabel[i].classList.add("text-danger")
                todolabel[i].innerHTML = "Ingrese datos por favor"
            }else{
                todoInput[i].style.borderColor = "black";
                todolabel[i].classList.remove("text-danger")
                todolabel[i].innerHTML = ""
            }
        })

        if(todoInput[i].value == ""){
            event.preventDefault();
            todoInput[i].style.borderColor = "red";
            todolabel[i].innerHTML = "Ingrese datos por favor"
        }else{
            todoInput[i].style.borderColor = "black";
            todolabel[i].innerHTML = ""
        }
    }

    if(opcion == "Seleccionar"){
        event.preventDefault();
        document.getElementById("selecSome").innerHTML = "Selecciona un paquete por favor"
    }else{
        document.getElementById("selecSome").innerHTML = ""
    }
}

