<?php
    header('Content-Type: application/json; charset=UTF-8');
    require_once('mdlTipo.class.php');

    $id_tipo =null;
    $accion=null;
    $id_tipo=isset($_GET['id_tipo']) ? $_GET['id_tipo']:null;
    $accion=$_SERVER['REQUEST_METHOD'];
    $data=array();
    switch($accion){
        case 'POST':
            $data_input=file_get_contents('php://input');
            $data_input=json_decode($data_input, true);
            $i=0;
            $cont=0;
            if(is_numeric($id_tipo)){
                foreach($data_input['tipo'] as $key=>$datos){
                    $resultado=$tipo->update($datos,$id_tipo);
                    if($resultado){
                        $data[$i]['mensaje']="tipo actualizado";
                        $data[$i]['datos']=$datos;
                        $cont++;
                    }else{
                        $data['mensaje']="error no se actualizo";
                    }
                    $i++;
                }
                $data['mensaje']="El metodo de actualizacion se mando llamar(".$cont.")";
            }else{
                
                foreach($data_input['tipo'] as $key=>$datos){
                    $resultado=$tipo->create($datos);
                    if($resultado){
                        $data[$i]['mensaje']="tipo insertado";
                        $data[$i]['datos']=$datos;
                        $cont++;
                    }else{
                        $data['mensaje']='Error, tipo no insertado';
                    }
                    $i++;
                }
                $data['mensaje']="el metodo de insercion se mando a llamar(".$cont.")";
            }
        break;
        case 'DELETE':
            if(is_numeric($id_tipo)){
                $n=$tipo->delete($id_tipo);
                if($n>0){
                    $data['cantidad']=$n;
                    $data['mensaje']='se elimino el tipo'.$id_tipo;
                }else{
                    $data['mensaje']='no existe el tipo';
                }
            }
            break;
        case 'GET':
            default:
            if(is_numeric($id_tipo)){
                $data=$tipo->readOne($id_tipo);
            }
            else{
                $data=$tipo->read();
            }
    }
    $data=json_encode($data);
    echo $data;
?>