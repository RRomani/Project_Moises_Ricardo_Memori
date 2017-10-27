//inicializamos variables generales
var contador = 0;
var victoria = 0;
var carta1;
var carta2;
var control_Tiempo = true;
var cont_Ayudas = 3;
var bloqueo = false; //Variable de control para que no se pueda hacer un tercer click

function inicializar() {
    start_timer();
}

//funcion para cada carta con el metodo event
function flip(event) {
    var tiempo_Comprobacion = 2000; //tiempo en ms para el stop de la funcion setTimeout
    //si carta1 no tiene nada asignado, carta2 no tiene nada asignado y la variable "bloqueo" es false, a la carta1 le asignamos el div de el primer click y le cambiamos la "class" para que se voltee
    if (carta1 == null && carta2 == null && bloqueo == false) {
        carta1 = event.currentTarget;
        carta1.setAttribute("class", "flip");
        carta1.removeAttribute("onclick");
        //Llamamos la funcion de Sonidos con parametro 1 que esta assignado al sonido del flip de la carta 
        Sonidos(1);
    }
    //lo mismo que arriba pero para el click 2 ya que ahora la carta1 es not null. 
    else if (carta1 != null && carta2 == null && bloqueo == false) {
        carta2 = event.currentTarget;
        carta2.setAttribute("class", "flip");
        carta2.removeAttribute("onclick");
        //Llamamos la funcion de Sonidos con parametro 1 que esta assignado al sonido del flip de la carta
        Sonidos(1);

        //cambiamos el bloqueo a true para que no se pueda entrar en ningun if hasta cambiar la varaible bloqueo
        bloqueo = true;
    }
    //cuando tenemos las dos cartas asignadasentramos en este if
    if (carta1 != null && carta2 != null) {
        //con setTimeout decimos que haga la funcion en un tiempo determinado (en nuestro caso es 2000 que son 2 segundos)
        setTimeout(function () {
            Comprobacion();
        }, tiempo_Comprobacion);
    }

}

// Funcion encargada de gestionar si la comprobacion de las cartas volteadas es correcta o incorrecta, le pasamos por parametros control, que se encarga de que no se pueda voltear una tercera carta.
function Comprobacion() {
    //si los ids coinciden, le quitamos el onclick para que se quede boca arriba y no entre a la funcion
    if (carta1.getAttribute("id") == carta2.getAttribute("id")) {
        //ponemos las variables a como estaban al principio
        EstadoInicial();
        //Llamamos la funcion de Sonidos con parametro 2 que esta assignado al sonido de comprobación correcta
        Sonidos(2);
        //usamos un contador para los intentos y victoria para saber cuantas estan bloqueadas
        victoria += 1;
    } else {
        //Modificamos los atributos de carta1 y carta2 en el caso de que la comprobacion no fuera correcta y le assignamos la clase "flip-container" y le volvemos a assignar un evento onclick llamando a nuestra funcion "flip(event)"
        carta1.setAttribute("class", "flip-container");
        carta1.setAttribute("onclick", "flip(event)");
        carta2.setAttribute("class", "flip-container");
        carta2.setAttribute("onclick", "flip(event)");
        //ponemos las variables a como estaban al principio
        EstadoInicial();
        //Llamamos la funcion de Sonidos con parametro 3 que esta assignado al sonido de comprobación erronea 
        Sonidos(3);
    }

    //Llamamos a la funcion mostrarContador() para actualizar el contador de los intentos.
    mostrarContador();

    //miramos si victoria es igual al numero de parejas del juego para saber si este a terminado.
    var nivel = document.getElementById("titulo").getAttribute("colspan");
    //Con esta formula comprobamos que la condicion de victoria se cumpla, contamos el numero de parejas totales que tenemos que tener.
    if (victoria == (nivel * nivel) / 2) {
        //Cambiamos la variable global control_Tiempo para que se pare el tiempo encuanto se entre en la funcion.
        control_Tiempo = false;
        //Llamamos la funcion RecogidaValores que recogera la informacion del jugador: nombre, puntuacion y tiempo.
        RecogidaValores();
        //Llamamos la funcion de Sonidos con parametro 5 que esta assignado al sonido de fin de partida.
        Sonidos(5);
    }
}

//Funcion que vuelve a poner valores a estado Inicial y aumentado 1 el contador de intentos, a esta funcion le pasamos por parametros control
function EstadoInicial() {
    carta1 = null;
    carta2 = null;
    bloqueo = false;
    contador += 1;
}

//Funcion que modifica el contador de intentos para mostrarlo por web
function mostrarContador() {
    document.getElementById("Control").innerHTML = contador;
}

//Funcion que recoge los valores para ponerlos en el ranking
function RecogidaValores() {
    var nombre = document.getElementById("Ranking").getAttribute("player");
    document.getElementById("restart").setAttribute("style", "display:block");
    document.getElementById("nombreJugador").value = nombre;
    document.getElementById("puntuacion").value = contador;
    document.getElementById("my_timer").innerHTML;
}

//Funcion que se encarga de reproduccir los sonidos, para esta funcion pasaremos un parametro que sera la que se encargara de pasar por el switch para activar un sonido u otro
function Sonidos(valor) {
    //Guardamos en audio el "tag" que hemos creado encargado de reporoduccir sonidos
    var audio = document.getElementById("audio");
    //Hacemos un switch al que le pasaremos el parametro que le hemos pasado a la funcion 
    switch (valor) {
        //En cada case se repetira el mismo proceso, modificamos la src de audio para pasarle el sonido que queramos, aplicamos un currentTime para si es necesario para avanzar el sonido para que quede mejor y por ultimo hacemos un play de audio para que se reproduzca el sonido que acabamos de assignado
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

//Funcion encargada del tiempo
function start_timer() {
    //Comprobamos si la variable global control_Tiempo es true
    if (control_Tiempo) {
        var timer = document.getElementById("my_timer").innerHTML; // Guardamos el texto dentro del elemento "my_timer" que hemos creado en el php de "tabla.php"
        var arr = timer.split(":"); // Creamos una variable array en la que guardaremos la informacion que recibimos de la variable anterior y separamos el array por ":"
        var min = arr[0]; // Assignamos la posicion 0 del array que acabamos de crear a los minutos
        var sec = arr[1]; // Assignamos la posicion 1 del array que acabamos de crear a los segundos

        //Control de tiempo
        if (sec == 59) {
            min++;
            sec = 0;
            if (min < 10) {
                min = "0" + min;
            }
        } else {
            sec++;
            if (sec == 0) {
                sec = "00";
            } else if (sec < 10) {
                sec = "0" + sec;
            }
        }
        //Modificamos el elemento "my_timer" para que se vea el cambio de tiempo
        document.getElementById("my_timer").innerHTML = min + ":" + sec;
        //Usamos la funcion setTimeout para llamar a esta misma funcion cada 1000 ms = 1 segundo
        setTimeout(start_timer, 1000);
    }
}

//Funcion para la ayuda.
function ayuda() {
    var Tiempo_Espera_Ayuda = 3000; // 
    //Recogemos todos los elementos que tengan como clase ".flip-container" y los guardaremos como un nodeList.
    var cards = document.querySelectorAll(".flip-container");

    //Comprobamos que te queden ayudas y sino mostramos un alert diciendo que no te quedan ayudas.
    if (cont_Ayudas > 0) {

        //Recorremos todo el nodeList que hemos encontrado antes.
        for (i = 0; i < cards.length; i++) {
            //Comprobamos que tenga un atributo onclick, esta comprobacion no se si es excesiva para controlar que el cambio de clase no pase a cartas que ya han sido giradas.
            if (cards[i].getAttribute("onclick") == "flip(event)") {
                //Aplicamos un cambio de clase al elemento "i" del nodeList que hemos recogido antes.
                cards[i].setAttribute("class", "flip");
            }
        }

        // Llamamos a la funcion setTimeout con la funcion encargada de voltear las cartas de vuelta despues de X tiempo.
        setTimeout(flipBack, Tiempo_Espera_Ayuda);

        contador += 5; // Sumamos 5 intentos por usar la ayuda, esta operacion seria lo mismo que: contador = contador + 5;
        cont_Ayudas--; // Restamos 1 ayuda de las totales, esta operacion seria lo mismo que: cont_Ayudas = cont_Ayudas - 1;

        //Llamamos a la funcion mostrarContador() para actualizar el contador de los intentos.
        mostrarContador;
    } else {
        //En el caso de que no te queden mas ayudas mostramos un alert avisando de esto.
        alert("No te quedan pistas");
    }
}

//Funcion que volvera a girar las cartas despues de girar
function flipBack() {
    //Recogemos todos los elementos que tengan como clase ".flip" y los guardaremos como un nodeList.
    var cards = document.querySelectorAll(".flip");
    //Recorremos todo el nodeList que hemos encontrado antes.
    for (i = 0; i < cards.length; i++) {
        //Comprobamos que tenga un atributo onclick, esta comprobacion no se si es excesiva para controlar que el cambio de clase no pase a cartas que ya han sido giradas.
        if (cards[i].getAttribute("onclick") == "flip(event)") {
            //Aplicamos un cambio de clase al elemento "i" del nodeList que hemos recogido antes.
            cards[i].setAttribute("class", "flip-container");
        }
    }
}
