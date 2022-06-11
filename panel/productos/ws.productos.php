<?php
    header('Content-Type: application/json; charset=UTF-8');
    require_once('mdlProducto.class.php');

    $id_producto =null;
    $accion=null;
    $id_producto=isset($_GET['id_producto']) ? $_GET['id_producto']:null;
    $accion=$_SERVER['REQUEST_METHOD'];
    $data=array();
    switch($accion){
        case 'POST':
            $data_input=file_get_contents('php://input');
            $data_input=json_decode($data_input, true);
            $i=0;
            $cont=0;
            if(is_numeric($id_producto)){
                foreach($data_input['producto'] as $key=>$datos){
                    $resultado=$producto->update($datos,$id_producto);
                    if($resultado){
                        $data[$i]['mensaje']="producto actualizado";
                        $data[$i]['datos']=$datos;
                        $cont++;
                    }else{
                        $data['mensaje']="error no se actualizo";
                    }
                    $i++;
                }
                $data['mensaje']="El metodo de actualizacion se mando llamar(".$cont.")";
            }else{
                
                foreach($data_input['producto'] as $key=>$datos){
                    $resultado=$producto->create($datos);
                    if($resultado){
                        $data[$i]['mensaje']="producto insertado";
                        $data[$i]['datos']=$datos;
                        $cont++;
                    }else{
                        $data['mensaje']='Error, producto no insertado';
                    }
                    $i++;
                }
                $data['mensaje']="el metodo de insercion se mando a llamar(".$cont.")";
            }
        break;
        case 'DELETE':
            if(is_numeric($id_producto)){
                $n=$producto->delete($id_producto);
                if($n>0){
                    $data['cantidad']=$n;
                    $data['mensaje']='se elimino el producto'.$id_producto;
                }else{
                    $data['mensaje']='no existe el producto';
                }
            }
            break;
        case 'GET':
            default:
            if(is_numeric($id_producto)){
                $data=$producto->readOne($id_producto);
            }
            else{
                $data=$producto->read();
            }
    }
    $data=json_encode($data);
    echo $data;
?>