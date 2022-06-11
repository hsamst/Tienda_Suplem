<?php
    header('Content-Type: application/json; charset=UTF-8');
    require_once('mdlUsuario.class.php');

    $id_usuario =null;
    $accion=null;
    $id_usuario=isset($_GET['id_usuario']) ? $_GET['id_usuario']:null;
    $accion=$_SERVER['REQUEST_METHOD'];
    $data=array();
    switch($accion){
        case 'POST':
            $data_input=file_get_contents('php://input');
            $data_input=json_decode($data_input, true);
            $i=0;
            $cont=0;
            if(is_numeric($id_usuario)){
                foreach($data_input['usuario'] as $key=>$datos){
                    $resultado=$usuario->update($datos,$id_usuario);
                    if($resultado){
                        $data[$i]['mensaje']="usuario actualizado";
                        $data[$i]['datos']=$datos;
                        $cont++;
                    }else{
                        $data['mensaje']="error no se actualizo";
                    }
                    $i++;
                }
                $data['mensaje']="El metodo de actualizacion se mando llamar(".$cont.")";
            }else{
                
                foreach($data_input['usuario'] as $key=>$datos){
                    $resultado=$usuario->create($datos);
                    if($resultado){
                        $data[$i]['mensaje']="usuario insertado";
                        $data[$i]['datos']=$datos;
                        $cont++;
                    }else{
                        $data['mensaje']='Error, usuario no insertado';
                    }
                    $i++;
                }
                $data['mensaje']="el metodo de insercion se mando a llamar(".$cont.")";
            }
        break;
        case 'DELETE':
            if(is_numeric($id_usuario)){
                $n=$usuario->delete($id_usuario);
                if($n>0){
                    $data['cantidad']=$n;
                    $data['mensaje']='se elimino el usuario'.$id_usuario;
                }else{
                    $data['mensaje']='no existe el usuario';
                }
            }
            break;
        case 'GET':
            default:
            if(is_numeric($id_usuario)){
                $data=$usuario->readOne($id_usuario);
            }
            else{
                $data=$usuario->read();
            }
    }
    $data=json_encode($data);
    echo $data;
?>