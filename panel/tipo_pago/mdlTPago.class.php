<?php
require_once('../Sistema.class.php');
class TipoP extends Sistema{
    public $id_tipo_p;
    public $tipo_p;

    public function read(){
        $this->connect();
        $sql = "SELECT * from tipo_pago";
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
    public function readOne($id_tipo_p){
        $this->connect();
        $sql = "SELECT * from tipo_pago tp
                WHERE tp.id_tipo_p=:id_tipo_p;";
        $stmt = $this->con->prepare($sql);
        $stmt -> bindParam(':id_tipo_p', $id_tipo_p, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0]))?$datos[0]:null;
        return $datos;
    }
    public function create($datos){
        $this->connect();
        $sql="INSERT INTO tipo_pago (tipo_p) 
        VALUES (:tipo_p)";
        $stmt = $this->con->prepare($sql);
        $stmt -> bindParam(':tipo_p', $datos['tipo_p'], PDO::PARAM_STR);
        $rs = $stmt->execute();
        return  $stmt->rowCount();
    }

    public function update($datos, $id_tipo_p){
        $this->connect();
        $sql = "UPDATE tipo_pago SET 
        tipo_p = :tipo_p
         WHERE id_tipo_p = :id_tipo_p";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(":tipo_p",$datos['tipo_p'], PDO::PARAM_STR);
        $stmt->bindParam(":id_tipo_p",$id_tipo_p, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return  $stmt->rowCount();

    }

    public function delete($id_tipo_p){
        $this -> connect();
        $sql="DELETE FROM tipo_pago WHERE id_tipo_p=:id_tipo_p";
        $stmt=$this->con->prepare($sql);
        $stmt -> bindParam(':id_tipo_p', $id_tipo_p, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();
        
    }


    /**
     * Get the value of id_tipo_p
     */ 
    public function getId_tipo_p()
    {
        return $this->id_tipo_p;
    }

    /**
     * Set the value of id_tipo_p
     *
     * @return  self
     */ 
    public function setId_tipo_p($id_tipo_p)
    {
        $this->id_tipo_p = $id_tipo_p;

        return $this;
    }

    /**
     * Get the value of tipo_p
     */ 
    public function getTipo_p()
    {
        return $this->tipo_p;
    }

    /**
     * Set the value of tipo_p
     *
     * @return  self
     */ 
    public function setTipo_p($tipo_p)
    {
        $this->tipo_p = $tipo_p;

        return $this;
    }
}
$tipo_pago= new TipoP;
?>