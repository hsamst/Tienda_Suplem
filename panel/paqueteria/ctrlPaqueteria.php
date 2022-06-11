<?php
    require_once('mdlPaqueteria.class.php');
    $sistema -> validarRol('Administrador');
    $id_paqueteria = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_paqueteria = isset($_GET['id_paqueteria']) ? $_GET['id_paqueteria'] : NULL;
        $accion = $_GET['accion'];
    }
    switch($accion){
        case 'new':
            require_once('AgregaPaque.php');
        break;

        case 'add': 
            $datos = $_POST;
            $resultado = $paqueteria->create($datos);
            $paqueteria->message($resultado, ($resultado)?"La paqueteria se agrego correctamente": "Ocurrio un error al agregar la paqueteria");
            $datos = $paqueteria->read();
            require_once('paqueteria.php');
        break;

        case 'modify':
            $datos = $paqueteria->readOne($id_paqueteria);
            $datospaque= $paqueteria->read();
            if(is_array($datos)){
                require_once('AgregaPaque.php');
            } else{
                $paqueteria->message(0,"Ocurrio un error, la paqueteria no exixte");
                $datospaque= $paqueteria->read();
                require_once('AgregaPaque.php');
            }
            
        break;

        case 'update':
            $datos=$_POST;
            $resultado=$paqueteria->update($datos,$id_paqueteria);
            $paqueteria->message($resultado, ($resultado)?"El tipo se modifco correctamente": "Ocurrio un error al modificar el tipo");
            $datos = $paqueteria->read();
            require_once('paqueteria.php');
            break;

        case 'delete':
            $datoelemit=$paqueteria->delete($id_paqueteria);
            
        default:
            $datos = $paqueteria->read();
            require_once('paqueteria.php');
    }
    require_once('../../cabeceras/footer.php');
?>