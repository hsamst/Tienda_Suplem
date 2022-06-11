<?php
require_once('../Sistema.class.php');
class paqueteria extends Sistema{
    public $id_paqueteria;
    public $nombre;
    
    /**
     * Get the value of id_tipo
     */ 
    public function getId_paqueteria()
    {
        return $this->id_paqueteria;
    }

    /**
     * Set the value of id_tipo
     *
     * @return  self
     */ 
    public function setId_paqueteria($id_paqueteria)
    {
        $this->id_paqueteria = $id_paqueteria;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function read(){
        $this->connect();
        $sql = "SELECT * from paqueteria";
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
    public function readOne($id_paqueteria){
        $this->connect();
        $sql = "SELECT * from paqueteria paque
                WHERE paque.id_paqueteria=:id_paqueteria;";
        $stmt = $this->con->prepare($sql);
        $stmt -> bindParam(':id_paqueteria', $id_paqueteria, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0]))?$datos[0]:null;
        return $datos;
    }
    public function create($datos){
        $this->connect();
        $sql="INSERT INTO paqueteria (nombre) 
        VALUES (:nombre)";
        $stmt = $this->con->prepare($sql);
        $stmt -> bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $rs = $stmt->execute();
        return  $stmt->rowCount();
    }

    public function update($datos, $id_paqueteria){
        $this->connect();
        $sql = "UPDATE paqueteria SET 
        nombre = :nombre
         WHERE id_paqueteria = :id_paqueteria";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(":nombre",$datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":id_paqueteria",$id_paqueteria, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return  $stmt->rowCount();

    }

    public function delete($id_tipo){
        $this -> connect();
        $sql="DELETE FROM paqueteria WHERE id_paqueteria=:id_paqueteria";
        $stmt=$this->con->prepare($sql);
        $stmt -> bindParam(':id_paqueteria', $id_paqueteria, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
        
    }

}
$paqueteria= new Paqueteria;
?>