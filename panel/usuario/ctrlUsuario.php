<?php
    require_once('mdlUsuario.class.php');
    $sistema -> validarRol('Administrador');
    $id_usuario = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : NULL;
        $accion = $_GET['accion'];
    }
    switch($accion){
        case 'new':
            require_once('AgregaUsu.php');
        break;

        case 'add':
            $datos = $_POST;
            $resultado = $usuario->create($datos);
            $usuario->message($resultado, ($resultado)?"El rol se agrego correctamente": "Ocurrio un error al agregar el rol");
            $datos = $usuario->read();
            require_once('usuario.php');
        break;

        case 'modify':
            $datos = $usuario->readOne($id_usuario);
            $datosusu= $usuario->read();
            if(is_array($datos)){
                require_once('AgregaUsu.php');
            } else{
                $usuario->message(0,"Ocurrio un error, el rol no exixte");
                $datosusu= $usuario->read();
                require_once('AgregaUsu.php');
            }
        break;

        case 'update':
            $datos=$_POST;
            $resultado=$usuario->update($datos,$id_usuario);
            $usuario->message($resultado, ($resultado)?"El rol se modifco correctamente": "Ocurrio un error al modificar el rol");
            $datos = $usuario->read();
            require_once('usuario.php');
            break;

        case 'delete':
            $datoelemiu=$usuario->delete($id_usuario);
            
        default:
            $datos = $usuario->read();
            require_once('usuario.php');
    }
    require_once('../../cabeceras/footer.php');
?>