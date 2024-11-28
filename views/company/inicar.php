<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer trabajo</title>
    <link rel="stylesheet" href="../../assets/css/decoración.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    </script>
    
</head>
<body>
    <section class="Estilo">
        <h4>Iniciar sesion</h4>
        <form action="" id="F">
            <input class="Caja" type="email" name="correo" id="correo" placeholder="Ingrese su correo">
            <input class="Caja" type="password" name="clave" id="clave" placeholder="Ingrese su contraseña">
            <p>Estoy de acuerdo con <a href="" class="Enlace">Términos y condiciones</a>
                <input class="confirmar" type="checkbox" name="check" id="confirmar">
            </p>
            <a href="registrarse.html" class="Enlace">Crear cuenta</a>
            <button class="botones" onclick="Alerta()" type="boton">Insertar</button>
        </form>
    </section>
    <script src="../../assets/js/iniciar.JS">
    </script>
</body>

</html>