<?php

    if ($lnk = new mysqli("localhost","root","","testing")):
        
        echo "Bienvenido<br/>" ;
        $res = $lnk->query("SELECT * FROM facturas WHERE idUsuario=1;") ;
        
        if ($res):
            echo "Fila: ".$res->num_rows."<br/>" ;
        endif;
    
    else:
        echo "Se ha producido un error: ".$lnk->connect_errror."</br>" ;
    endif;
    
    

