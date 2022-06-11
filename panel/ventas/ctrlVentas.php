<?php
 require_once('mdlVentas.class.php');
 $sistema -> validarRol('Administrador');
    $accion = NULL;
    require_once('../../cabeceras/headerAdm.php');
    switch($accion){
        default:
            $MisVenta = $ventas->read();
            require_once('ventas.php');
        break;
            require_once('ventas.php');
    }
    require_once('../../cabeceras/footer.php');
?>