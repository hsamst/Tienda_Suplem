<?php
require_once('../Sistema.class.php');

class Proveedor extends Sistema{

    public $id_proveedor;
    public $nombre;
    public $correo;
    public $telefono;
    
/**
     * Get the value of id_proveedor
     */ 
    public function getId_proveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * Set the value of id_proveedor
     *
     * @return  self
     */ 
    public function setId_proveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function read(){
        $this->connect();
        $sql = "SELECT * from proveedor";
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
    public function readOne($id_proveedor){
        $this->connect();
        $sql = "SELECT * from proveedor pr
                WHERE pr.id_proveedor=:id_proveedor;";
        $stmt = $this->con->prepare($sql);
        $stmt -> bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0]))?$datos[0]:null;
        return $datos;
    }

    public function create($datos){
        $this->connect();
        $sql="INSERT INTO proveedor (nombre, 
        correo, 
        telefono) 
        VALUES (:nombre, 
        :correo, 
        :telefono)";
        $stmt = $this->con->prepare($sql);
        $stmt -> bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt -> bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt -> bindParam(':telefono', $datos['telefono'], PDO::PARAM_INT);
        $rs = $stmt->execute();
        return  $stmt->rowCount();
    }

    public function update($datos, $id_proveedor){
        $this->connect();
        $sql = "UPDATE proveedor SET 
        nombre = :nombre,
        correo = :correo,
        telefono = :telefono
         WHERE id_proveedor = :id_proveedor";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(":nombre",$datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":correo",$datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(":telefono",$datos['telefono'], PDO::PARAM_INT);
        $stmt->bindParam(":id_proveedor",$id_proveedor, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return  $stmt->rowCount();
    }

    public function delete($id_proveedor){
        $this -> connect();
        $sql="DELETE FROM proveedor WHERE id_proveedor=:id_proveedor";
        $stmt=$this->con->prepare($sql);
        $stmt -> bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
        
    }
}
$proveedor= new Proveedor;
?>