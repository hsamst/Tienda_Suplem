<?php
    header('Content-Type: application/json; charset=UTF-8');
    require_once('mdlProveedor.class.php');

    $id_proveedor =null;
    $accion=null;
    $id_proveedor=isset($_GET['id_proveedor']) ? $_GET['id_proveedor']:null;
    $accion=$_SERVER['REQUEST_METHOD'];
    $data=array();
    switch($accion){
        case 'POST':
            $data_input=file_get_contents('php://input');
            $data_input=json_decode($data_input, true);
            $i=0;
            $cont=0;
            if(is_numeric($id_proveedor)){
                foreach($data_input['proveedor'] as $key=>$datos){
                    $resultado=$proveedor->update($datos,$id_proveedor);
                    if($resultado){
                        $data[$i]['mensaje']="proveedor actualizado";
                        $data[$i]['datos']=$datos;
                        $cont++;
                    }else{
                        $data['mensaje']="error no se actualizo";
                    }
                    $i++;
                }
                $data['mensaje']="El metodo de actualizacion se mando llamar(".$cont.")";
            }else{
                
                foreach($data_input['proveedor'] as $key=>$datos){
                    $resultado=$proveedor->create($datos);
                    if($resultado){
                        $data[$i]['mensaje']="proveedor insertado";
                        $data[$i]['datos']=$datos;
                        $cont++;
                    }else{
                        $data['mensaje']='Error, proveedor no insertado';
                    }
                    $i++;
                }
                $data['mensaje']="el metodo de insercion se mando a llamar(".$cont.")";
            }
        break;
        case 'DELETE':
            if(is_numeric($id_proveedor)){
                $n=$proveedor->delete($id_proveedor);
                if($n>0){
                    $data['cantidad']=$n;
                    $data['mensaje']='se elimino el proveedor'.$id_proveedor;
                }else{
                    $data['mensaje']='no existe el proveedor';
                }
            }
            break;
        case 'GET':
            default:
            if(is_numeric($id_proveedor)){
                $data=$proveedor->readOne($id_proveedor);
            }
            else{
                $data=$proveedor->read();
            }
    }
    $data=json_encode($data);
    echo $data;
?>