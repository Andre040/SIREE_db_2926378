function Alert() {
    document.getElementById('F').addEventListener('submit', function (e) {
        e.preventDefault();
        
    });
    var N = document.getElementById('Nombres').value;
    var G = document.getElementById('correo').value;
    var C = document.getElementById('clave').value;
    var CC = document.getElementById('clave2').value;
    var Rl = document.getElementById('rol').value;
    var Cel = document.getElementById('celular').value;
    var Dirr = document.getElementById('direccion').value;
    var A = document.getElementById('confirmar').checked;
    var SL = /^[a-zA-Z]+$/;
    var SN = /^[0-9]+$/;
    if (N.length == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Porfavor llene el nombre',
        })
    } else
    if (G.length == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Porfavor llene el correo',
        })
    } else
    if (C.length == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Porfavor llene la contraseña',
        })
    } else
    if (SL.test(C) == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Porfavor llene la contraseña',
        })
    } else
    if (SL.test(C)==false) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La contraseña solo permite letras',
        })

    } else
    if (C.length < 7) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La clave debe tener al menos 7 caracteres',
        })
    } else
    if (C !== CC) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La contraseña no coincide',
        })
    } else {
        if (A == false) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Acepte los términos y condiciones'
            })
        } else {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Bienvenido!',
                        text: 'Iniciaste sesión correctamente',
                        confirmButtonText: '<a href="Pagina.html">Aceptar</a>'
                    })

                }
            }
        }
    


function mensaje() {
    document.getElementById('mensajeclave').style.display = 'block';
}

function ocultar() {
    document.getElementById('mensajeclave').style.display = 'none';
}