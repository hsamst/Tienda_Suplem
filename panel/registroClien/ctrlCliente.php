<?php 
    require_once('mdlCiente.class.php');
   
    $accion = NULL;

    if (isset($_GET['accion'])) {
        $id_cliente = isset($_GET['id_cliente']) ? $_GET['id_cliente'] : NULL;
        $accion = $_GET['accion'];
    }
    switch ($accion) {


        case 'register':
            $datos = $_POST;
            if ($registro->register($datos)) {
                $sistema->message(1, "Felidades ahora eres un usuario de Fauna, Por favor Ingrese sus credenciales");
                require_once('../login/ctrlLogin.php');
            }
            else{
                $sistema->message(0, "Ocurrio un error");
            }
        break;

        default:
            require_once('registro.php');
    }

?>