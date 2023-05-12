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


let inputUsuario = document.querySelector('input[name="usuario"]');
let inputU = document.getElementById('usuario');

inputUsuario.addEventListener('input', function(event) {
  let usuarioExiste = false;   
  if(inputUsuario.value != "") {
    fetch('http://127.0.0.1:8000/api/usuarios',{
      headers:{
        'Accept': 'application/json',
        'Authorization': 'Bearer 6|0ZpD95GnVNvUXnq8rGYIScxzxeqpstpHOBZLgqQs'
      }
    })
    .then(res => res.json())
    .then(respuesta => {
      respuesta.forEach(persona => {
        if(inputUsuario.value == persona.usuario) {
          inputU.style.border = '1px solid red';
          console.log("Este usuario ya existe");
          usuarioExiste = true;
        }
      });
      if (!usuarioExiste) {
        inputU.style.border = '0px solid red';
      }
    })
    .catch(error => console.log(error.message));
  } else {
    inputU.style.border = '0px solid red';
  }
});





