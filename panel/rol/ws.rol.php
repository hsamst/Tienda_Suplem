<?php
    header('Content-Type: application/json; charset=UTF-8');
    require_once('mdlRol.class.php');

    $id_rol =null;
    $accion=null;
    $id_rol=isset($_GET['id_rol']) ? $_GET['id_rol']:null;
    $accion=$_SERVER['REQUEST_METHOD'];
    $data=array();
    switch($accion){
        case 'POST':
            $data_input=file_get_contents('php://input');
            $data_input=json_decode($data_input, true);
            $i=0;
            $cont=0;
            if(is_numeric($id_rol)){
                foreach($data_input['rol'] as $key=>$datos){
                    $resultado=$rol->update($datos,$id_rol);
                    if($resultado){
                        $data[$i]['mensaje']="rol actualizado";
                        $data[$i]['datos']=$datos;
                        $cont++;
                    }else{
                        $data['mensaje']="error no se actualizo";
                    }
                    $i++;
                }
                $data['mensaje']="El metodo de actualizacion se mando llamar(".$cont.")";
            }else{
                
                foreach($data_input['rol'] as $key=>$datos){
                    $resultado=$rol->create($datos);
                    if($resultado){
                        $data[$i]['mensaje']="rol insertado";
                        $data[$i]['datos']=$datos;
                        $cont++;
                    }else{
                        $data['mensaje']='Error, rol no insertado';
                    }
                    $i++;
                }
                $data['mensaje']="el metodo de insercion se mando a llamar(".$cont.")";
            }
        break;
        case 'DELETE':
            if(is_numeric($id_rol)){
                $n=$rol->delete($id_rol);
                if($n>0){
                    $data['cantidad']=$n;
                    $data['mensaje']='se elimino el rol'.$id_rol;
                }else{
                    $data['mensaje']='no existe el rol';
                }
            }
            break;
        case 'GET':
            default:
            if(is_numeric($id_rol)){
                $data=$rol->readOne($id_rol);
            }
            else{
                $data=$rol->read();
            }
    }
    $data=json_encode($data);
    echo $data;
?>