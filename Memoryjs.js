var contador = 0;
var block = false;
var carta1;
var carta2;

function flip(event) {
    var clase = event.currentTarget.className;

    if (carta1 == null && carta2 == null && block == false) {
        carta1 = event.currentTarget;
        carta1.setAttribute("class", "flip");
    } else if (carta1 != null && carta2 == null && block == false) {
        carta2 = event.currentTarget;
        carta2.setAttribute("class", "flip");
        block = true;
    }
    if (carta1 != null && carta2 != null) {
        setTimeout(function () {
            if (carta1.id == carta2.id) {
                carta1.setAttribute("class", "blocked");
                carta2.setAttribute("class", "blocked");
                carta1 = null;
                carta2 = null;
                block = false;
            } else {
                carta1.setAttribute("class", "flipped");
                event2.setAttribute("class", "flipped");
                carta1 = null;
                carta2 = null;
                block = false;
            }
            contador += 1;
            document.getElementById("Control").innerHTML = contador;
        }, 2000);

    }
}
