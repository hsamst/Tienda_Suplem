<?php
require_once('../Sistema.class.php');
class Estatus extends Sistema{
    public $id_estatus;
    public $descripcion;
    
    /**
     * Get the value of id_tipo
     */ 
    public function getId_estatus()
    {
        return $this->id_estatus;
    }

    /**
     * Set the value of id_estatus
     *
     * @return  self
     */ 
    public function setId_estatus($id_estatus)
    {
        $this->id_estatus = $id_estatus;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function read(){
        $this->connect();
        $sql = "SELECT * from estatus";
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
    public function readOne($id_estatus){
        $this->connect();
        $sql = "SELECT * from estatus e
                WHERE e.id_estatus=:id_estatus";
        $stmt = $this->con->prepare($sql);
        $stmt -> bindParam(':id_estatus', $id_estatus, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0]))?$datos[0]:null;
        return $datos;
    }
    public function create($datos){
        $this->connect();
        $sql="INSERT INTO estatus (descripcion) 
        VALUES (:descripcion)";
        $stmt = $this->con->prepare($sql);
        $stmt -> bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $rs = $stmt->execute();
        return  $stmt->rowCount();
    }

    public function update($datos, $id_estatus){
        $this->connect();
        $sql = "UPDATE estatus SET 
        descripcion = :descripcion
         WHERE id_estatus = :id_estatus";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(":descripcion",$datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(":id_estatus",$id_estatus, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return  $stmt->rowCount();

    }

    public function delete($id_estatus){
        $this -> connect();
        $sql="DELETE FROM estatus WHERE id_estatus=:id_estatus";
        $stmt=$this->con->prepare($sql);
        $stmt -> bindParam(':id_estatus', $id_estatus, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
        
    }

}
$estatus= new Estatus;
?>