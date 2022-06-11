<?php
    require_once('mdlTPago.class.php');

    $id_tipo_p = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_tipo_p = isset($_GET['id_tipo_p']) ? $_GET['id_tipo_p'] : NULL;
        $accion = $_GET['accion'];
    }

    switch($accion){
        case 'new':
            //$sistema -> validarRol('Administrador');
            require_once('AgregaTipoPa.php');
        break;

        case 'add':
            //$sistema -> validarRol('Administrador');  
            $datos = $_POST;
            $resultado = $tipo_pago->create($datos);
            $tipo_pago->message($resultado, ($resultado)?"El tipo se agrego correctamente": "Ocurrio un error al agregar el tipo");
            $datos = $tipo_pago->read();
            require_once('tipo_pago.php');
        break;

        case 'modify':
            //$sistema -> validarRol('Administrador');
            $datos = $tipo_pago->readOne($id_tipo_p);
            $datostiP= $tipo_pago->read();
            if(is_array($datos)){
                require_once('AgregaTipoPa.php');
            } else{
                $tipo_pago->message(0,"Ocurrio un error, el tipo no existe");
                $datostiP= $tipo_pago->read();
                require_once('AgregaTipoPa.php');
            }
        break;

        case 'update':
            //$sistema -> validarRol('Administrador');
            $datos=$_POST;
            $resultado=$tipo_pago->update($datos,$id_tipo_p);
            $tipo_pago->message($resultado, ($resultado)?"El tipo se modifco correctamente": "Ocurrio un error al modificar el tipo");
            $datos = $tipo_pago->read();
            require_once('tipo_pago.php');
            break;

        case 'delete':
            $datoelemipa=$tipo_pago->delete($id_tipo_p);
            
        default:
            $datos = $tipo_pago->read();
            require_once('tipo_pago.php');
    }
    require_once('../../cabeceras/footer.php');
?>