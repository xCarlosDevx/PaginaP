//Cuerpo y informacion del formulario//
const registerForm = document.querySelector('.register-form');
const nombre = document.getElementById('nombre')
const apellido = document.getElementById('apellido')
const email = document.getElementById('email')
const password = document.getElementById('password')
const confirmPassword = document.getElementById('confirm-password');
//Listener al evento de precionar el submit dentro del formulario//
registerForm.addEventListener("submit", (e) => {

    e.preventDefault();
// || = (Or) si ninguno de estos campos tiene valor hara la siguiente validacion ! = (no) //
    if (!nombre.value || !apellido.value || !email.value || !password.value || !confirmPassword.value) {
        console.log("Faltan campos por llenar")
// .legth = cantidad de caracteres validacion de que la constrase;a debe de ser mayor a 6 caracteres //
    } else if (password.value.length < 6 || confirmPassword.value.length < 6) {
        console.log("la clave tiene que tener mas de 6 caracteres")
    }
// Si la contrasena no es igual != (no) //
    else if (password.value !== confirmPassword.value) {
        console.log("Las claves no coinciden")
    }
    else {
// Variable "User" sera igual a todos los datos que introduzca el usuario//
        let user = {
            nombre: nombre.value,
            apellido: apellido.value,
            email: email.value,
            password: password.value,
            role: "user"
        }

        try {
// Request antigua para realizar peticiones al servidor  XHR //
            let xhr = new XMLHttpRequest()
// Abrir la Api creada anteriormente //
            xhr.open("POST", '/api/usuarios/signup')
// Encabezado que vendra de json tipo texto, traduce el json a string //
            xhr.setRequestHeader('content-type', 'application/json')
            xhr.onload = function () {
                let messageSuccess = JSON.parse(xhr.responseText)
                if (messageSuccess.status == "success") {
                    let message = JSON.parse(xhr.responseText)
                    console.log(message.msg)
// Limpieza de datos //
                    nombre.value = ""
                    apellido.value = ""
                    email.value = ""
                    password.value = ""
                    confirmPassword.value = ""
                } else {
                    let message = JSON.parse(xhr.responseText)
                    console.log(message.msg)
                }
            }
// Traduce el String nuevamente en JSon //
            xhr.send(JSON.stringify(user))
        } catch (error) {
            console.log(error)
        }
    }
})