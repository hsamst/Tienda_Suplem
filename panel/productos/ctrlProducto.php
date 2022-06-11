<?php
    require_once('mdlProducto.class.php');
    require_once('../tipo/mdlTipo.class.php');
    require_once('../proveedores/mdlProveedor.class.php');
    $sistema -> validarRol('Administrador');

    $id_producto = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : NULL;
        $accion = $_GET['accion'];
    }

    switch($accion){
        case 'new':
            $datostip = $tipo->read();
            $datosprove= $proveedor->read();
            require_once('FormAgreP.php');
        break;

        case 'add':  
            $datos = $_POST;
            $resultado = $producto->create($datos);
            $producto->message($resultado, ($resultado)?"El producto se agrego correctamente": "Ocurrio un error al agregar La conferencia");
            $datos = $producto->read();
            require_once('index1.php');
        break;

        case 'modify':
            $datos = $producto->readOne($id_producto);
            $datostip = $tipo->read();
            $datosprove= $proveedor->read();
            if(is_array($datos)){
                require_once('FormAgreP.php');
            } else{
                $producto->message(0,"Ocurrio un error, el producto no exixte");
                $datostip = $tipo->read();
                $datosprove= $proveedor->read();
                require_once('FormAgreP.php');
            }
        break;

        case 'update':
            $datos=$_POST;
            $resultado=$producto->update($datos,$id_producto);
            $producto->message($resultado, ($resultado)?"El producto se modifco correctamente": "Ocurrio un error al modificar al Producto");
            $datos = $producto->read();
            require_once('index1.php');
            break;

        case 'delete':
            $datoelemiP=$producto->delete($id_producto);
            

        default:
            $datos = $producto->read();
            
            require_once('index1.php');
    }
    require_once('../../cabeceras/footer.php');

?>