<?php

function numeracion() {//esta funcion detecto en la pagina que este
    //con  esto cojo la pagina, al dar a los botones de la pagina selecciono el numero y lo devuelvo, por defecto sera la pagina 1  
    if (isset($_GET["page"])) {
        $pn = $_GET["page"];
    } else {
        $pn = 1;
    };

    return $pn;
}