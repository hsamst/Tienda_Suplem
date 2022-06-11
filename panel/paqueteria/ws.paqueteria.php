<?php
    header('Content-Type: application/json; charset=UTF-8');
    require_once('mdlPaqueteria.class.php');

    $id_paqueteria =null;
    $accion=null;
    $id_paqueteria=isset($_GET['id_paqueteria']) ? $_GET['id_paqueteria']:null;
    $accion=$_SERVER['REQUEST_METHOD'];
    $data=array();
    switch($accion){
        case 'POST':
            $data_input=file_get_contents('php://input');
            $data_input=json_decode($data_input, true);
            $i=0;
            $cont=0;
            if(is_numeric($id_paqueteria)){
                foreach($data_input['paqueteria'] as $key=>$datos){
                    $resultado=$paqueteria->update($datos,$id_paqueteria);
                    if($resultado){
                        $data[$i]['mensaje']="paqueteria actualizado";
                        $data[$i]['datos']=$datos;
                        $cont++;
                    }else{
                        $data['mensaje']="error no se actualizo";
                    }
                    $i++;
                }
                $data['mensaje']="El metodo de actualizacion se mando llamar(".$cont.")";
            }else{
                
                foreach($data_input['paqueteria'] as $key=>$datos){
                    $resultado=$paqueteria->create($datos);
                    if($resultado){
                        $data[$i]['mensaje']="tipo insertado";
                        $data[$i]['datos']=$datos;
                        $cont++;
                    }else{
                        $data['mensaje']='Error, paqueteria no insertado';
                    }
                    $i++;
                }
                $data['mensaje']="el metodo de insercion se mando a llamar(".$cont.")";
            }
        break;
        case 'DELETE':
            if(is_numeric($id_paqueteria)){
                $n=$paqueteria->delete($id_paqueteria);
                if($n>0){
                    $data['cantidad']=$n;
                    $data['mensaje']='se elimino el tipo'.$id_paqueteria;
                }else{
                    $data['mensaje']='no existe el tipo';
                }
            }
            break;
        case 'GET':
            default:
            if(is_numeric($id_paqueteria)){
                $data=$paqueteria->readOne($id_paqueteria);
            }
            else{
                $data=$paqueteria->read();
            }
    }
    $data=json_encode($data);
    echo $data;
?>