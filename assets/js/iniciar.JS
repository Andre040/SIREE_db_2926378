function Alerta(){
    document.getElementById('F').addEventListener('submit', function(e){
        e.preventDefault();
        Validar();
    });
var G=document.getElementById('correo').value;
var C=document.getElementById('clave').value;
var A=document.getElementById('confirmar').checked;
    if(G.length==0){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Porfavor llene el correo',
        })
    }else
        if (C.length==0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Porfavor llene la contraseña',
                footer: '<a href>¿Olvidaste tu contraseña?</a>'
            })
        }else{
            if (A==false){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Acepte los términos y condiciones'
                })
            }else{
        Swal.fire({
            icon: 'success',
            title: '¡Bienvenido!',
            text: 'Iniciaste sesión correctamente',
            confirmButtonText: '<a href="../../views/company/index.view.php">Aceptar</a>'

        })
    }
}
}