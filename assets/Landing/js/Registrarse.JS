function Alert(event) {
    // Prevenir el envío por defecto del formulario
    event.preventDefault();
  
    // Obtener los valores de los campos
    var N = document.getElementById("Nombres").value;
    var G = document.getElementById("correo").value;
    var C = document.getElementById("clave").value;
    var CC = document.getElementById("clave2").value;
    var Rol = document.getElementById("Rol").value;
    var Celular = document.getElementById("Celular").value;
    var Direccion = document.getElementById("Direccion").value;
    var A = document.getElementById("confirmar").checked;
    var correoRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|co|com\.co|net|es|yahoo)$/;
    var SL = /^[a-zA-Z]+$/;
    var RestricionNombre = /^[a-zA-Z\s]+$/;
    var SoloNumeros = /^[0-9]+$/;
  
    // Validación de campos
    if (N.length == 0) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingrese el nombre",
      });
    } else if (!RestricionNombre.test(N)) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "No se permite números",
      });
    } else if (G.length == 0) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingrese el correo",
      });
    } else if (!correoRegex.test(G)) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Falta agregar el domunio (com, co, com.co, net, es, yahoo)",
      });
    } else if (C.length == 0) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingrese la contraseña",
      });
    } else if (C.length < 7) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "La clave debe tener al menos 7 caracteres",
      });
    } else if (!SL.test(C)) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "La contraseña solo permite letras",
      });
    } else if (CC.length == 0) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor Confirme la contraseña",
      });
    } else if (C !== CC) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "La contraseña no coincide",
      });
    } else if (Rol.length == 0) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingresa el rol",
      });
    } else if (Celular.length == 0) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingresa el celular",
      });
    } else if (!SoloNumeros.test(Celular)) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Solo se aceptan números",
      });
    } else if (Direccion.length == 0) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingresa la dirección",
      });
    } else if (!A) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Acepte los términos y condiciones",
      });
    } else {
      Swal.fire({
        icon: "success",
        title: "¡Bienvenido!",
        text: "Te registraste correctamente",
        confirmButtonText: '<a href="../roles/crud_php/registrar_computadores.php">Aceptar</a>',
      });
      // Aquí podrías enviar el formulario si todo es válido
    }
  
    // Retornar falso previene el envío si algo no es válido
    return false;
  }
  
  function mensaje(tipo) {
      if (tipo === 'correo') {
        document.getElementById("mensajeCorreo").style.display = "block";
        document.getElementById("mensajeclave").style.display = "none";
      } else if (tipo === 'clave') {
        document.getElementById("mensajeclave").style.display = "block";
        document.getElementById("mensajeCorreo").style.display = "none";
      }
    }
  
  function ocultar() {
      document.getElementById("mensajeCorreo").style.display = "none";
      document.getElementById("mensajeclave").style.display = "none";
  }
  
  