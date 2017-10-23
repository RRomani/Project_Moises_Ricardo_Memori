//inicializamos variables generales
var contador = 0;
var victoria = 0;
var block = false;
var carta1;
var carta2;

function inicializar() {
    start_timer();
}
//funcion para cada carta con el metodo event
function flip(event) {
    //si carta1 no tiene nada asignado, carta2 no tiene nada asignado y la variable "block" es false, a la carta1 le asignamos el div de el primer click y le cambiamos la "class" para que se voltee
    if (carta1 == null && carta2 == null && block == false) {
        carta1 = event.currentTarget;
        carta1.setAttribute("class", "flip");
        carta1.removeAttribute("onclick");
        sonidos(1, carta1);
        //lo mismo que arriba pero para el click 2 ya que ahora la carta1 es not null.
    } else if (carta1 != null && carta2 == null && block == false) {
        carta2 = event.currentTarget;
        carta2.setAttribute("class", "flip");
        carta2.removeAttribute("onclick");
        sonidos(1, carta2);

        //cambiamos el block a true para que no se pueda entrar en ningun if hasta cambiar la varaible block
        block = true;
    }
    //cuando tenemos las dos cartas asignadasentramos en este if
    if (carta1 != null && carta2 != null) {
        //con setTimeout decimos que haga la funcion en un tiempo determinado (en nuestro caso es 2000 que son 2 segundos)
        setTimeout(function () {
            //si los ids coinciden, le quitamos el onclick para que se quede boca arriba y no entre a la funcion
            if (carta1.childNodes[1].childNodes[3].getAttribute("id") == carta2.childNodes[1].childNodes[3].getAttribute("id")) {
                //ponemos las variables a como estaban al principio
                EstadoInicial();
                sonidos(2);
                //usamos un contador para los intentos y victoria para saber cuantas estan bloqueadas
                victoria += 1;
            } else {
                carta1.setAttribute("class", "flipped");
                carta1.setAttribute("onclick", "flip(event)");
                carta2.setAttribute("class", "flipped");
                carta2.setAttribute("onclick", "flip(event)");
                EstadoInicial();
                sonidos(3);
            }

            document.getElementById("Control").innerHTML = contador;
            //miramos si victoria es igual al numero de parejas del juego para saber si este a terminado
            var nivel = document.getElementById("titulo").getAttribute("colspan");
            if (victoria == (nivel * nivel) / 2) {
                RecogidaValores();
                sonidos(5);
            }
        }, 1000);
    }

}

function EstadoInicial() {
    carta1 = null;
    carta2 = null;
    block = false;
    contador += 1;
}

function RecogidaValores() {
    var nombre = document.getElementById("Ranking").getAttribute("player");
    document.getElementById("restart").setAttribute("style", "display:block");
    document.getElementById("nombreJugador").value = nombre;
    document.getElementById("puntuacion").value = contador;
}

function sonidos(valor) {
    var audio = document.getElementById("audio");
    switch (valor) {
        case 1:
            audio.setAttribute("src", "../sonido/flip.mp3");
            audio.currentTime = 0.7;
            audio.play();
            break;
        case 2:
            audio.setAttribute("src", "../sonido/correcto.mp3");
            audio.play();
            break;
        case 3:
            audio.setAttribute("src", "../sonido/fallo.mp3");
            audio.currentTime = 1.25;
            audio.play();
            break;
        case 4:
            audio.setAttribute("src", "../sonido/pista.mp3");
            audio.play();
            break;
        case 5:
            audio.setAttribute("src", "../sonido/victoria.mp3");
            audio.play();
            break;
    }
}
var active = true;

function start_timer() {
    if (active) {
        var timer = document.getElementById("my_timer").innerHTML;
        var arr = timer.split(":");
        var min = arr[0];
        var sec = arr[1];

        if (sec == 59) {
            min++;
            sec = 0;
            if (min < 10) {
                min = "0" + min;
            }
        } else {
            sec++;
            if (sec < 10) {
                sec = "0" + sec;
            }
        }
        document.getElementById("my_timer").innerHTML = min + ":" + sec;
        setTimeout(start_timer, 1000);
    }
}
