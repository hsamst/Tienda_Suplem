<?php
require_once('../Sistema.class.php');
class Tipo extends Sistema{
    public $id_tipo;
    public $tipo;
    
    /**
     * Get the value of id_tipo
     */ 
    public function getId_tipo()
    {
        return $this->id_tipo;
    }

    /**
     * Set the value of id_tipo
     *
     * @return  self
     */ 
    public function setId_tipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function read(){
        $this->connect();
        $sql = "SELECT * from tipo";
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
    public function readOne($id_tipo){
        $this->connect();
        $sql = "SELECT * from tipo t
                WHERE t.id_tipo=:id_tipo;";
        $stmt = $this->con->prepare($sql);
        $stmt -> bindParam(':id_tipo', $id_tipo, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0]))?$datos[0]:null;
        return $datos;
    }
    public function create($datos){
        $this->connect();
        $sql="INSERT INTO tipo (tipo) 
        VALUES (:tipo)";
        $stmt = $this->con->prepare($sql);
        $stmt -> bindParam(':tipo', $datos['tipo'], PDO::PARAM_STR);
        $rs = $stmt->execute();
        return  $stmt->rowCount();
    }

    public function update($datos, $id_tipo){
        $this->connect();
        $sql = "UPDATE tipo SET 
        tipo = :tipo
         WHERE id_tipo = :id_tipo";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(":tipo",$datos['tipo'], PDO::PARAM_STR);
        $stmt->bindParam(":id_tipo",$id_tipo, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return  $stmt->rowCount();

    }

    public function delete($id_tipo){
        $this -> connect();
        $sql="DELETE FROM tipo WHERE id_tipo=:id_tipo";
        $stmt=$this->con->prepare($sql);
        $stmt -> bindParam(':id_tipo', $id_tipo, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
        
    }

}
$tipo= new Tipo;
?>