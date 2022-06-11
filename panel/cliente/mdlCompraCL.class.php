<?php
    require_once('../Sistema.class.php');

    class ComprasClie extends Sistema{
 

        public function read($sesionCorreo){
            $this->connect();
            $sql = "SELECT cl.id_cliente,
                            cl.nombre,
                            u.correo,
                            c.id_compra,
                            c.fecha
                    FROM detalle_compra dc
                    INNER JOIN compra c on dc.id_compra = c.id_compra
                    INNER JOIN cliente cl on c.id_cliente = cl.id_cliente
                    INNER JOIN usuario u on cl.id_usuario = u.id_usuario
                    WHERE u.correo = :correo
                    GROUP by c.id_compra";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':correo', $sesionCorreo, PDO::PARAM_STR);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

        public function readCliente($correo){
            $this->connect();
            $sql = "SELECT cl.id_cliente
                    FROM cliente cl
                    INNER JOIN usuario u on cl.id_usuario = u.id_usuario
                    WHERE u.correo = :correo";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

        public function createShop($id_cliente,$id_paqueteria,$id_producto,$stokcomprado){
            $this->connect();
            $this->con->beginTransaction();
            try{
                $sql = "INSERT INTO compra (fecha, id_cliente,id_paqueteria)
                                VALUES (now(), :id_cliente, :id_paqueteria)";
                $stmt = $this->con->prepare($sql);
                $stmt -> bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
                $stmt -> bindParam(':id_paqueteria', $id_paqueteria, PDO::PARAM_INT);
                $rs = $stmt->execute();
                if ($stmt->rowCount()>0) {

                    $sql =  "SELECT * FROM compra WHERE id_cliente = :id_cliente";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
                    $rs = $stmt->execute();
                    //Traemos arreglo de todas la compras mediante el ID_compra
                    $clienteS = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //Asignamos siempre el la ultima posiscion del arrgle de las compras 
                    $cliente = end($clienteS);
                    $sql = "INSERT INTO detalle_compra(id_compra, id_producto, cantidad)
                                    VALUES(:id_compra, :id_producto, :cantidad)";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bindParam(':id_compra',$cliente['id_compra'] , PDO::PARAM_INT);
                    $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
                    $stmt->bindParam(':cantidad', $stokcomprado, PDO::PARAM_INT);
                    $rs = $stmt->execute();
                    if ($stmt->rowCount()>0) {
                        $this->con->commit();
                        return true;
                    }
                }
                $this->con->rollback();
                return false;
            }catch (Exception $e){
                $this->con->rollback();
                return false;
                }

            return false;
        }
    }
    $compraC = new ComprasClie;
    
?>