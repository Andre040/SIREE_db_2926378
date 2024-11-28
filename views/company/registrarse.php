<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer trabajo</title>
    <link rel="stylesheet" href="././assets/Landing/css/decoración.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    </script>

</head>

<body>
    <section class="Estilo">
        <h4>Registrarse</h4>
        <form
            id="F">
            <input class="Caja" type="text" name="Nombres" id="Nombres" placeholder="Ingrese su nombre" onfocus="ocultar()">
            <input class="Caja" type="email" name="correo" id="correo" placeholder="Ingrese su correo" onfocus="ocultar()">
            <input class="Caja" type="password" name="clave" id="clave" placeholder="Ingrese su contraseña" onfocus="mensaje()"> </input>
            <h5 id="mensajeclave">La contraseña debe tener almenos 7 caracteres y solo letras</h5>
            <input class="Caja" type="password" name="clave2" id="clave2" placeholder="Confirmar contraseña" onfocus="ocultar()"></input>
           <input placeholder="Tipo de documento" list="Documento" class="Caja" id="DC" onfocus="ocultar()"></input>
            <input class="Caja" type="number" name="Id" id="Id" placeholder="Numero de documento" onfocus="ocultar()">
            
            
            <p>Estoy de acuerdo con <a href="" class="Enlace">Términos y condiciones</a>
            <input class="confirmar" type="checkbox" name="check" id="confirmar"> </p>
            <a href="inicar.html" class="Enlace">Iniciar sección</a>
            <button class="botones" onclick="Alert()" type="boton" onfocus="ocultar()">Insertar</button>
        </form>
    </section>
    <script src="././assets/Landing/js/Registrarse.JS">
    </script>
</body>

</html>