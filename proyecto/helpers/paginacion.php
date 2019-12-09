<?php


function paginar($paginas_totales, $controlador, $pn) {
    ?>

    <a href='<?php echo $controlador ?>?page=1'>Primera</a>
    <?php
    
    if($pn == 1) {//si la pagina es la primera
        
        ?>
        <a hidden href='<?php echo $controlador ?>?page=<?php echo $pn-1 ?>'><<</a>
        <?php
    }
    
    else {// si la pagina no es la primera
             ?>
        <a  href='<?php echo $controlador ?>?page=<?php echo $pn-1 ?>'><<</a>
        <?php
    }
    
    $link = "";
    
    for ($i = 1; $i <= $paginas_totales; $i++) {//bucle para imprimir la numeracion

        if ($i == $pn) {
            $link .= "<a class='active' href='$controlador?page="//esto hara que la pagina 
                    . $i . "'>" . $i . "</a>"; //en la que estamos este de un color verde
        }
        
        else {
            $link .= "<a href=" . "$controlador?page=$i" . ">$i</a>";
        }
        
    };
    
    echo $link;
    
        if($pn == $paginas_totales) {//si estamos en la ultima pagina
        
        ?>
        <a hidden href='<?php echo $controlador ?>?page=<?php echo $pn+1 ?>'>>></a>
        <?php
    }
    
    else {
             ?>
        <a  href='<?php echo $controlador ?>?page=<?php echo $pn+1 ?>'>>></a>
        <?php
    }
    ?> 
    <a href='<?php echo $controlador ?>?page=<?= $paginas_totales ?>'>Ultima</a>
    
    <?php
   
    
}


