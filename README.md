# Project_Moises_Ricardo_Memori
Projecte Memory

Farem un projecte de desenvolupament per parelles per fer un joc del memory.
Especificacions funcionals: regles del joc del memory

    Tenim un taulell de NxM cartes (N i M configurable)
    Les cartes és un conjunt de parelles (2 uns, 2 dosos, 2 tresos, etc.)
    Les cartes estan cap per avall, i l'usuari no veu quina hi ha a cada lloc
    Torns:
        L'usuari anirà destapant les cartes (de dos en dos) per trobar les parelles.
        Si al destapar les 2 cartes no surten parella, l'usuari les visualitzarà durant S segons (configurable) però es tornaran a tapar seguidament.
        Si al destapar les 2 cartes apareix una parella, aquestes es mantindran visibles
    Quan l'usuari destapi totes les cartes, acaba la partida
    Puntuació:
        La puntuació serà el nº total d'intents que ha fet el jugador.
        Es considera millor puntuació el menor nº d'intents.
        El rànking de puntuacions serà, doncs, ascendent. El millor classificat serà el que hagi resolt el joc amb menor nº d'intents.


Especificacions no funcionals

Aquest projecte es pot resoldre de moltes maneres, sobretot tenint en compte que tenim a la nostra disposició una part de servidor en PHP i una part al client, en Javascript.

Per avaluar el vostre treball d'acord als mòduls M6, M7 i M9, i treure un 10 en cadascun, cal complir amb les següents especificacions:

    M7 (servidor, PHP):
        El servidor generarà la partida, la quadrícula, les parelles de cartes i les distribuirà sobre el tauler.
        Quan el jugador acabi la partida s'enviaran per POST la puntuació (intents) i el nom del jugador.
        Les dades de la partida es guardaran en un arxiu de text on, com a mínim, ha de figurar la puntuació i el nom del jugador.
        Es podrà visitar una pàgina que mostri el rànking de les millors puntuacions, i els jugadors que les han fet. Cal, doncs, ordenar les puntuacions de menor a major.
    M6 (client, Javascript):
        Al client el jugador anirà destapant les cartes
        Només pot destapar 2 cartes que es mostraran durant S segons. Si intenta destapar una 3a, no deixarà.
        Comptabilitzarem el nº d'intents i el mostrarem en el camp d'un formulari perquè l'usuari sàpiga en tot moment com va.
        Quan s'hagin destapat totes les cartes de forma exitosa, s'acaba la partida, i s'envia el formulari amb la puntuació i el nom de l'usuari al servidor perquè el posi al rànking.
    M9 (intefície):
        ...coming soon...


Variació per temp
s
Es pot fer una variant del joc: es dona un temps limitat i l'usuari ha de destapar el màxim de caselles possibles.

En aquest cas la puntuació seria el nº de parelles destapades, pel què el rànking hauria de ser descendents (de més punts a menys punts). 