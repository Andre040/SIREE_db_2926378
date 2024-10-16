function Alert() {
  document.getElementById("F").addEventListener("submit", function (e) {
    e.preventDefault();
  });
  var N = document.getElementById("Nombres").value;
  var AP = document.getElementById("apellido").value;
  var G = document.getElementById("correo").value;
  var C = document.getElementById("clave").value;
  var A = document.getElementById("confirmar").checked;
  var ID = document.getElementById("Id").value;
  var D = document.getElementById("DC").value;
  var CC = document.getElementById("clave2").value;
  var SL = /^[a-zA-Z]+$/;
  if (N.length == 0) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Porfavor llene el nombre",
    });
  } else if (AP.length == 0) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Porfavor llene el apellido",
    });
  } else if (G.length == 0) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Porf--*+*avor llene el correo",
    });
  } else if (C.length == 0) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Porfavor llene la contraseña",
      footer: "<a href>¿Olvidaste tu contraseña?</a>",
    });
  } else if (SL.test(C) == false) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "La contraseña solo permite letras",
    });
  } else if (C.length < 7) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "La clave debe tener al menos 7 caracteres",
    });
  } else if (C !== CC) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "La contraseña no coincide",
      footer: "<a href>¿Olvidaste tu contraseña?</a>",
    });
  } else {
    if (D.length == 0) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Porfavor seleccione el tipo de documento",
      });
    } else {
      if (ID.length == 0) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Porfavor llene el documento",
        });
      } else {
        if (A == false) {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Acepte los términos y condiciones",
          });
        } else {
          Swal.fire({
            icon: "success",
            title: "¡Bienvenido!",
            text: "Ya estas registrado",
            confirmButtonText:
              '<a href="../../views/company/index.view.php">Aceptar</a>',
          });
        }
      }
    }
  }
}

function mensaje() {
  document.getElementById("mensajeclave").style.display = "block";
}

function ocultar() {
  document.getElementById("mensajeclave").style.display = "none";
}
