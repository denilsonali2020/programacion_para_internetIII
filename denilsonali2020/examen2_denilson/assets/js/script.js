function validarFormulario() {
    const titulo = document.getElementById('titulo').value.trim();
    const descripcion = document.getElementById('descripcion').value.trim();
    const prioridad = document.getElementById('prioridad').value;
    const departamento = document.getElementById('departamento').value.trim();

    if (titulo === '' || descripcion === '' || prioridad === '' || departamento === '') {
        Swal.fire({
            icon: 'warning',
            title: 'Campos obligatorios',
            text: 'Todos los campos deben ser completados.'
        });
        return false;
    }

    return true;
}
