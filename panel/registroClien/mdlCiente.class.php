<?php
    require_once('../Sistema.class.php');

    class Cliente extends Sistema{
 
        public function register($datos){
            if ($this->validarCorreo($datos['correo'])) {
                if (isset($datos['nombre']) && isset($datos['contrasena'])) {
                    $this->connect();
                    $this->con->beginTransaction();
                    try{
                        $sql = "INSERT INTO usuario (correo,contrasena) VALUES (:correo, :contrasena)";
                        $stmt = $this->con->prepare($sql);
                        $datos['contrasena'] = md5($datos['contrasena']);
                        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
                        $stmt->bindParam(':contrasena', $datos['contrasena'], PDO::PARAM_STR);
                        $rs = $stmt->execute();
                        if ($stmt->rowCount()>0) {
                            $sql =  "SELECT * FROM usuario WHERE correo = :correo";
                            $stmt = $this->con->prepare($sql);
                            $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
                            $rs = $stmt->execute();
                            $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $sql = "INSERT INTO usuario_rol(id_usuario,id_rol) VALUES (:id_usuario, 2)";
                            $stmt = $this->con->prepare($sql);
                            $stmt->bindParam(':id_usuario', $usuario[0]['id_usuario'], PDO::PARAM_INT);
                            $rs = $stmt->execute();
                            if ($stmt->rowCount()>0) {
                                $sql = "INSERT INTO cliente(nombre, apaterno, amaterno, direccion, ciudad, cp, telefono, id_usuario) VALUES
                                    (:nombre, :apaterno, :amaterno, :direccion, :ciudad, :cp, :telefono, :id_usuario)";
                                $stmt = $this->con->prepare($sql);
                                $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
                                $stmt->bindParam(':apaterno', $datos['apaterno'], PDO::PARAM_STR);
                                $stmt->bindParam(':amaterno', $datos['amaterno'], PDO::PARAM_STR);
                                $stmt->bindParam(':direccion', $datos['direccion'], PDO::PARAM_STR);
                                $stmt->bindParam(':ciudad', $datos['ciudad'], PDO::PARAM_STR);
                                $stmt->bindParam(':cp', $datos['cp'], PDO::PARAM_INT);
                                $stmt->bindParam(':telefono', $datos['telefono'], PDO::PARAM_INT);
                                $stmt->bindParam(':id_usuario', $usuario[0]['id_usuario'], PDO::PARAM_INT);
                                $rs = $stmt->execute();
                                 if ($stmt->rowCount()>0) {
                                    //$this->sendMail($datos['correo'], "Bienvenido al congreso", "Ingrese al congreso y de mas");
                                    $this->con->commit();
                                    return true;
                                } 
                            }
                        }
                        
                        return true;
                    }catch (Exception $e){
                    $this->con->rollback();
                    return false;
                    }
                }
            }
            return false;   
        }  
    }
    $registro = new Cliente;
?>