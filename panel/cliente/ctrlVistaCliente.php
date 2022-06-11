<?php 
    require_once('../productos/mdlProducto.class.php');
    require_once('mdlCompraCL.class.php');
    require_once('../paqueteria/mdlPaqueteria.class.php');

    $sistema->validarRol('Usuario');

    $id_producto = NULL;
        $accion = NULL;
        if(isset($_GET['accion'])){
            $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : NULL;
            $accion = $_GET['accion'];
        }
    
        require_once '../../cabeceras/headerClien.php'; 
    
        switch($accion){
          case 'shop':
            //recuperar correo de la $_SESSION
            $correo=$_SESSION['correo'];
            $arrid_cliente=$compraC->readCliente($correo);
            $id_cliente=$arrid_cliente[0]['id_cliente'];//asignamos a la variable la posicion 0 en la posicion del cliente
            $stokcomprado=$_POST['stokcomprado'];
            $id_paqueteria=$_POST['id_paqueteria'];
            $shopCl=$compraC->createShop($id_cliente,$id_paqueteria,$id_producto,$stokcomprado);
            $stokrestado=$producto->updatestok($stokcomprado, $id_producto);
            require_once('indexP.php');
            break;

          case 'agregaCa':
            $pro=$producto->readOne($id_producto);
            $stokcomprado=$_POST['stokcomprado'];
            $stokrestado=$producto->updatestok($stokcomprado, $id_producto);
            require_once('carCliente.php');
            break;
            default;
            
            require_once('indexP.php');

        }
?>