//variables que almacenaran los numeros de la suma
let num1;
let num2;
//variables para guardar el resultado de la suma
let respuesta;
//variable donde se carga la opcion correcta
let indiceOpCorrecta;
//todos los elementos que voy a manipular de la pagina
txt_multi = document.getElementById("multiplicacion");
op1 = document.getElementById("op1");
op2 = document.getElementById("op2");
op3 = document.getElementById("op3");
txt_msj = document.getElementById("msj");
txt_resultado = document.getElementById("resultado");

function comenzar(){
    //cada vez que inicia limpio los campos
    txt_resultado.innerHTML ="?";
    txt_msj.innerHTML = "";

    //generacion de numeros aleatorios
    num1 = Math.round(Math.random()*9);
    num2 = Math.round(Math.random()*9);
    respuesta = num1 * num2;

    //asignacion de la suma para la visualizacion
    txt_multi.innerHTML = num1 + " * " + num2 + " = ";

    //generacion un numero para la opcion correcta
    indiceOpCorrecta = Math.round(Math.random()*2);
    if(indiceOpCorrecta==0){
        op1.innerHTML = respuesta;

        op2.innerHTML = respuesta * 2;
        op3.innerHTML = respuesta * 4;
    }
    if(indiceOpCorrecta==1){
        op2.innerHTML = respuesta;

        op1.innerHTML = respuesta * 2;
        op3.innerHTML = respuesta * 3;
    }
    if(indiceOpCorrecta==2){
        op3.innerHTML = respuesta;

        op1.innerHTML = respuesta * 3;
        op2.innerHTML = respuesta * 2;

    }
}

//respuesta correcta
function controlarRespuesta(opcionElegida){
    txt_resultado.innerHTML = opcionElegida.innerHTML;

    //controlador si es correcta
    if(respuesta == opcionElegida.innerHTML){
        txt_msj.innerHTML = "¡Excelente! Has acertado!";
        txt_msj.style.color = "green";

        setTimeout(comenzar, 2000);
    }else{
        txt_msj.innerHTML = "¡Incorrecta! Intentalo de nuevo...";
        txt_msj.style.color = "red";

        setTimeout(limpiar, 2000);
    }
}

function limpiar(){
    txt_resultado.innerHTML ="?";
    txt_msj.innerHTML = "";
}

comenzar();