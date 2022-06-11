<?php
    require_once('mdlEstatus.class.php');

    $id_estatus = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_estatus = isset($_GET['id_estatus']) ? $_GET['id_estatus'] : NULL;
        $accion = $_GET['accion'];
    }

    switch($accion){
        case 'new':
            //$sistema -> validarRol('Administrador');
            require_once('AgregaEstatus.php');
        break;

        case 'add':
            //$sistema -> validarRol('Administrador');  
            $datos = $_POST;
            $resultado = $estatus->create($datos);
            $estatus->message($resultado, ($resultado)?"El estatus se agrego correctamente": "Ocurrio un error al agregar el estatus");
            $datos = $estatus->read();
            require_once('estatus.php');
        break;

        case 'modify':
            //$sistema -> validarRol('Administrador');
            $datos = $estatus->readOne($id_estatus);
            $datosestat= $estatus->read();
            if(is_array($datos)){
                require_once('AgregaEstatu.php');
            } else{
                $estatus->message(0,"Ocurrio un error, el estatus no exixte");
                $datosestat= $estatus->read();
                require_once('AgregaEstatu.php');
            }
            
        break;

        case 'update':
            //$sistema -> validarRol('Administrador');
            $datos=$_POST;
            $resultado=$estatus->update($datos,$id_estatus);
            $estatus->message($resultado, ($resultado)?"El estatus se modifco correctamente": "Ocurrio un error al modificar el estatus");
            $datos = $estatus->read();
            require_once('estatus.php');
            break;

        case 'delete':
            $datoelemie=$estatus->delete($id_estatus);
            
        default:
            $datos = $estatus->read();
            require_once('estatus.php');
    }
    require_once('../../cabeceras/footer.php');
?>