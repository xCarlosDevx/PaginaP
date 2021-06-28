try {
    let contenido = document.getElementById('contenido'),
        contenido2 = document.getElementById('contenido2'),
        contenido3 = document.getElementById('contenido3'),
        contenedor = document.getElementById('contenedor'),
        btnocultar = document.getElementById('btnocultar'),
        btnmostrar = document.getElementById('btnmostrar'),
        boton3 = document.getElementById('boton3'),
        boton2 = document.getElementById('boton2'),
        boton1 = document.getElementById('boton1'),
        valor = 1;

        
 //Codigo de jorge copyright Modal//
 

    //Codigo de jorge copyright Modal//

    let modal = document.getElementById('miModal');
    let flex = document.getElementById('flex');
    let abrir = document.getElementById('abrir');
    let abrir2 = document.getElementById('abrir2');
    let abrir3 = document.getElementById('abrir3');
    let cerrar = document.getElementById('close');
  

    abrir.addEventListener('click', function () {
        modal.style.display = 'block';
    });
    abrir2.addEventListener('click', function () {
        modal.style.display = 'block';
    });
    abrir3.addEventListener('click', function () {
        modal.style.display = 'block';
    });
    cerrar.addEventListener('click', function () {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function (e) {
        if (e.target == flex) {
            modal.style.display = 'none';
        }
    });


    function MostrarC() {
        if (valor == 1) {
            contenido.style.display = "block";
            contenido2.style.display = "block";
            contenido3.style.display = "block";
            valor = 0;
            console.log(valor);
        } else {
            contenido.style.display = "none";
            contenido2.style.display = "none";
            contenido3.style.display = "none";
            valor =1;
            console.log(valor);
        }
    }
    boton1.addEventListener("click", MostrarC, true)
    boton2.addEventListener("click", MostrarC, true)
    boton3.addEventListener("click", MostrarC, true)



    boton2.addEventListener("click", () => {
        contenido2.style.display = "block";
        contenido.style.display = "none";
    });
    btnocultar.addEventListener("click", () => {
        contenedor.style.display = "none";
    });
    btnmostrar.addEventListener("click", () => {
        contenedor.style.display = "block";

    });
} catch (error) {

    console.log(`Se produjo el siguiente error ${error}`);

}
/*
let content = document.getElementById('content'),
    content2 = document.getElementById('content2'),
    button = document.getElementById('button'),
    button2 = document.getElementById('button2');


button.addclass("click", () => {
    Mostrar();
});




button2.addEventListener("click", () => {
    content2.style.display = "block";
    content.style.display = "none";
});

let btn = document.getElementById('btn'),
    caja = document.getElementById('caja'),
    contador = 0;

function Mostrar() {
    console.log('hola');

}
document.getElementById('content').classList.add("display.block");
document.getElementById('content2').classList.add("display.block");

function cambio() {
    if (contador == 0) {
        caja.classList.add('azul');
        contador = 1;
    } else {
        caja.classList.remove('azul');
        contador = 0;
    }
}
*/