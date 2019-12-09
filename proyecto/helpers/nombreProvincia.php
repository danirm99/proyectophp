<?php


function nombreProvincia($id) {//helper basico para sacar el nombre de provincia
    //  en los controladores de ver
    
    $getProvincia = new consultas();
                  
    return $getProvincia->getNombreProvincia($id);
}

