<?php
    require_once('mdlCompraCL.class.php');

    $sistema -> validarRol('Usuario');

    $id_compra = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_compra = isset($_GET['id_compra']) ? $_GET['id_compra'] : NULL;
        $accion = $_GET['accion'];
    }
    require_once('../../cabeceras/headerClien.php');

    switch($accion){

        case 'comprasC':
            default:
            $sesionCorreo = $_SESSION['correo'];
            $comprasCli = $compraC->read($sesionCorreo);
            require_once('ListaMisCompras.php');
        break;
    }
    require_once('../../cabeceras/footer.php');
?>