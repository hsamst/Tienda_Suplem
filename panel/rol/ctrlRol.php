<?php
    require_once('mdlRol.class.php');
    $sistema -> validarRol('Administrador');
    $id_rol = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_rol = isset($_GET['id_rol']) ? $_GET['id_rol'] : NULL;
        $accion = $_GET['accion'];
    }

    switch($accion){
        case 'new':
            require_once('AgregaRol.php');
        break;

        case 'add':
            $datos = $_POST;
            $resultado = $rol->create($datos);
            $rol->message($resultado, ($resultado)?"El rol se agrego correctamente": "Ocurrio un error al agregar el rol");
            $datos = $rol->read();
            require_once('rol.php');
        break;

        case 'modify':
            $datos = $rol->readOne($id_rol);
            $datostip= $rol->read();
            if(is_array($datos)){
                require_once('AgregaRol.php');
            } else{
                $rol->message(0,"Ocurrio un error, el rol no exixte");
                $datosrol= $rol->read();
                require_once('AgregaRol.php');
            }
        break;

        case 'update':
            $datos=$_POST;
            $resultado=$rol->update($datos,$id_rol);
            $rol->message($resultado, ($resultado)?"El rol se modifco correctamente": "Ocurrio un error al modificar el rol");
            $datos = $rol->read();
            require_once('rol.php');
            break;

        case 'delete':
            $datoelemir=$rol->delete($id_rol);
            
        default:
            $datos = $rol->read();
            require_once('rol.php');
    }
    require_once('../../cabeceras/footer.php');
?>