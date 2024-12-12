
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer trabajo</title>
    <link rel="stylesheet" href="././assets/Landing/css/decoración.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <section class="Estilo">
        <h4>Registrarse</h4>
        <form id="F" onsubmit="return Alert(event)">
            <input class="Caja" type="text" name="Nombres" id="Nombres" placeholder="Ingrese su nombre"
                onfocus="ocultar()" autofocus>
            <input class="Caja" type="email" name="correo" id="correo" placeholder="Ingrese su correo"
                onfocus="mensaje('correo')" onfocus="ocultar()"> </input>
            <h5 id="mensajeCorreo">Solo se permiten los dominios (com, co, com.co, net, es, yahoo)</h5>
            <input class="Caja" type="password" name="clave" id="clave" placeholder="Ingrese su contraseña"
                onfocus="mensaje('clave')"> </input>
            <h5 id="mensajeclave">La contraseña debe tener almenos 7 caracteres y solo letras</h5>
            <input class="Caja" type="password" name="clave2" id="clave2" placeholder="Confirmar contraseña"
                onfocus="ocultar()"></input>
            <input class="Caja" type="text" name="Rol" id="Rol" placeholder="Ingrese su rol" onfocus="ocultar()">
            <input class="Caja" type="text" name="Celular" id="Celular" placeholder="Ingrese su Celular"
                onfocus="ocultar()">
            <input class="Caja" type="text" name="Direccion" id="Direccion" placeholder="Ingrese su dirección"
                onfocus="ocultar()">
            <p>Estoy de acuerdo con <a href="" class="Enlace" target="_blank">Términos y condiciones</a>
                <input class="confirmar" type="checkbox" name="check" id="confirmar">
            </p>
            <button class="botones" type="submit" onfocus="ocultar()">Insertar</button>
            <a href="#" target="_blank" class="Enlace">Iniciar sesión</a>
        </form>
    </section>
    <script src="././assets/Landing/js/Registrarse.JS"></script>
</body>

</html>