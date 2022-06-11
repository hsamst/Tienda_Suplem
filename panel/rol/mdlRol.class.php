<?php
require_once('../Sistema.class.php');
class Rol extends Sistema{
    public $id_rol;
    public $rol;
    
    /**
     * Get the value of id_tipo
     */ 
    public function getId_rol()
    {
        return $this->id_rol;
    }

    /**
     * Set the value of id_tipo
     *
     * @return  self
     */ 
    public function setId_rol($id_rol)
    {
        $this->id_rol = $id_rol;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    public function read(){
        $this->connect();
        $sql = "SELECT * from rol";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos; 
    }

    /**
     * Retornar solo un ponente
     * @integger id_ponente
     * @return  array
     */ 
    public function readOne($id_rol){
        $this->connect();
        $sql = "SELECT * from rol r
                WHERE r.id_rol=:id_rol;";
        $stmt = $this->con->prepare($sql);
        $stmt -> bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0]))?$datos[0]:null;
        return $datos;
    }
    public function create($datos){
        $this->connect();
        $sql="INSERT INTO rol (rol) 
        VALUES (:rol)";
        $stmt = $this->con->prepare($sql);
        $stmt -> bindParam(':rol', $datos['rol'], PDO::PARAM_STR);
        $rs = $stmt->execute();
        return  $stmt->rowCount();
    }

    public function update($datos, $id_rol){
        $this->connect();
        $sql = "UPDATE rol SET 
        rol = :rol
         WHERE id_rol = :id_rol";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(":rol",$datos['rol'], PDO::PARAM_STR);
        $stmt->bindParam(":id_rol",$id_rol, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return  $stmt->rowCount();

    }

    public function delete($id_rol){
        $this -> connect();
        $sql="DELETE FROM rol WHERE id_rol=:id_rol";
        $stmt=$this->con->prepare($sql);
        $stmt -> bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
        
    }

}
$rol= new Rol;
?>