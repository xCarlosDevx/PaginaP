//Cuerpo y informacion del formulario//
const loginForm = document.querySelector('.login-form');
const email = document.getElementById('email')
const password = document.getElementById('password');
//Listener al evento de precionar el submit dentro del formulario//
loginForm.addEventListener("submit", (e) => {

    e.preventDefault();
// || = (Or) si ninguno de estos campos tiene valor hara la siguiente validacion ! = (no) //
    if (!email.value || !password.value) {
        console.log("Faltan campos por llenar")
    }
    else {
// Variable "User" sera igual a todos los datos que introduzca el usuario//
        let user = {

            email: email.value,
            password: password.value,
          
        }

        try {
// Request antigua para realizar peticiones al servidor  XHR //
            let xhr = new XMLHttpRequest()
// Abrir la Api creada anteriormente //
            xhr.open("POST", '/api/usuarios/signin')
// Encabezado que vendra de json tipo texto, traduce el json a string //
            xhr.setRequestHeader('content-type', 'application/json')
            xhr.onload = function () {
                let messageSuccess = JSON.parse(xhr.responseText)
                if (messageSuccess.status == "success") {
                    let message = JSON.parse(xhr.responseText)
                    console.log(message.msg)
// Limpieza de datos //
                
                    email.value = ""
                    password.value = ""
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