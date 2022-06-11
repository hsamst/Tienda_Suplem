<?php
    require_once('mdlTipo.class.php');
    $sistema -> validarRol('Administrador');
    $id_tipo = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_tipo = isset($_GET['id_tipo']) ? $_GET['id_tipo'] : NULL;
        $accion = $_GET['accion'];
    }

    switch($accion){
        case 'new':
            require_once('AgregaTipo.php');
        break;

        case 'add':  
            $datos = $_POST;
            $resultado = $tipo->create($datos);
            $tipo->message($resultado, ($resultado)?"El tipo se agrego correctamente": "Ocurrio un error al agregar el tipo");
            $datos = $tipo->read();
            require_once('tipo.php');
        break;

        case 'modify':
            $datos = $tipo->readOne($id_tipo);
            $datostip= $tipo->read();
            if(is_array($datos)){
                require_once('AgregaTipo.php');
            } else{
                $tipo->message(0,"Ocurrio un error, el tipo no exixte");
                $datostip= $tipo->read();
                require_once('AgregaTipo.php');
            }
        break;

        case 'update':
            $datos=$_POST;
            $resultado=$tipo->update($datos,$id_tipo);
            $tipo->message($resultado, ($resultado)?"El tipo se modifco correctamente": "Ocurrio un error al modificar el tipo");
            $datos = $tipo->read();
            require_once('tipo.php');
            break;

        case 'delete':
            $datoelemit=$tipo->delete($id_tipo);
            
        default:
            $datos = $tipo->read();
            require_once('tipo.php');
    }
    require_once('../../cabeceras/footer.php');
?>