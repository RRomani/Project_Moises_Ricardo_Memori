//inicializamos variables generales
var contador = 0;
var victoria = 0;
var block = false;
var carta1;
var carta2;

//funcion para cada carta con el metodo event
function flip(event) {
    //si carta1 no tiene nada asignado, carta2 no tiene nada asignado y la variable "block" es false, a la carta1 le asignamos el div de el primer click y le cambiamos la "class" para que se voltee
    if (carta1 == null && carta2 == null && block == false) {
        carta1 = event.currentTarget;
        carta1.setAttribute("class", "flip");
        //lo mismo que arriba pero para el click 2 ya que ahora la carta1 es not null.
    } else if (carta1 != null && carta2 == null && block == false) {
        carta2 = event.currentTarget;
        carta2.setAttribute("class", "flip");
        //cambiamos el block a true para que no se pueda entrar en ningun if hasta cambiar la varaible block
        block = true;
    }
    //cuando tenemos las dos cartas asignadasentramos en este if
    if (carta1 != null && carta2 != null) {
        //con setTimeout decimos que haga la funcion en un tiempo determinado (en nuestro caso es 2000 que son 2 segundos)
        setTimeout(function () {
            //si los ids coinciden, le quitamos el onclick para que se quede boca arriba y no entre a la funcion
            if (carta1.childNodes[1].childNodes[3].getAttribute("id") == carta2.childNodes[1].childNodes[3].getAttribute("id")) {
                carta1.setAttribute("onclick", " ");
                carta2.setAttribute("onclick", " ");
                //ponemos las variables a como estaban al principio
                carta1 = null;
                carta2 = null;
                block = false;
                //usamos un contador para los intentos y victoria para saber cuantas estan bloqueadas
                victoria += 1;
                contador += 1;
            } else {
                carta1.setAttribute("class", "flipped");
                carta2.setAttribute("class", "flipped");
                carta1 = null;
                carta2 = null;
                block = false;
                contador += 1;
            }

            document.getElementById("Control").innerHTML = contador;
            //miramos si victoria es igual al numero de parejas del juego para saber si este a terminado
            var nivel = document.getElementById("titulo").getAttribute("colspan");
            if (victoria == (nivel * nivel) / 2) {
                alert("Has ganado campeon! :3");
                document.getElementById("restart").setAttribute("style", "display:block");
            }
        }, 1000);
    }

}
