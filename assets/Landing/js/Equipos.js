document.getElementById('computerForm').addEventListener('submit', function (event) {
    // Obtener valores de los campos del formulario
    var nombre = document.getElementById('nombre').value;
    var categoria = document.getElementById('categoria').value;
    var valorRenta = document.getElementById('valor_renta').value;
    var estado = document.getElementById('estado').value;
    var cantidadDisponible = document.getElementById('cantidad_disponible').value;
    // Validar que todos los campos están llenos
    if (!nombre || !categoria || !valorRenta || !estado || !cantidadDisponible) {
        Swal.fire({ icon: 'error', title: 'Oops...', text: 'Todos los campos son obligatorios.', });
        event.preventDefault(); return;
    }
    // Validar el formato del valor de renta
    var valorRentaPattern = /^\d+(\.\d{1,2})?$/;
    if (!valorRentaPattern.test(valorRenta)) {
        Swal.fire({
            icon: 'error', title: 'Error en el Valor de Renta',
            text: 'El valor de renta debe ser un número válido con hasta dos decimales.',
        });
        event.preventDefault(); return;
    }
    // Validar que la cantidad disponible es un número positivo 
    if (cantidadDisponible < 0) {
        Swal.fire({
            icon: 'error', title: 'Error en la Cantidad Disponible',
            text: 'La cantidad disponible debe ser un número positivo.',
        });
        event.preventDefault();
    }
});