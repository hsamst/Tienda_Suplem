<?php
    require_once('mdlProveedor.class.php');
    $sistema -> validarRol('Administrador');
    $id_proveedor = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_proveedor = isset($_GET['id_proveedor']) ? $_GET['id_proveedor'] : NULL;
        $accion = $_GET['accion'];
    }
    switch($accion){
        case 'new':
            require_once('AgregaProvee.php');
        break;

        case 'add':  
            $datos = $_POST;
            $resultado = $proveedor->create($datos);
            $proveedor->message($resultado, ($resultado)?"El proveedor se agrego correctamente": "Ocurrio un error al agregar el proveedor");
            $datos = $proveedor->read();
            require_once('Proveedores.php');
        break;

        case 'modify':
            $datos = $proveedor->readOne($id_proveedor);
            $datosprove= $proveedor->read();
            if(is_array($datos)){
                require_once('AgregaProvee.php');
            } else{
                $producto->message(0,"Ocurrio un error, el proveedor no exixte");
                $datosprove= $proveedor->read();
                require_once('AgregaProvee.php');
            }
        break;

        case 'update':
            $datos=$_POST;
            $resultado=$proveedor->update($datos,$id_proveedor);
            $proveedor->message($resultado, ($resultado)?"El proveedor se modifco correctamente": "Ocurrio un error al modificar el proveedor");
            $datos = $proveedor->read();
            require_once('Proveedores.php');
            break;

        case 'delete':
            $datoelemiP=$proveedor->delete($id_proveedor);
            

        default:
            $datos = $proveedor->read();
            require_once('Proveedores.php');
    }
    require_once('../../cabeceras/footer.php');
?>