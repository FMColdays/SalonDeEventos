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

