<?php
    require_once('../Sistema.class.php');

    class Comprobante extends Sistema{

        public function lista($id_compra){
            $this->connect();
            $sql = "SELECT * FROM compra WHERE id_compra = :id_compra;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_compra', $id_compra, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datos = (isset($datos[0]))?$datos[0]:null;
            if (! is_null($datos)) {
                $sql = "SELECT DISTINCTROW dc.id_compra,
                concat(nombre,' ',apaterno,' ',amaterno) as Nombre_Cliente,
                c.fecha
                    From detalle_compra dc
                    INNER JOIN compra c on dc.id_compra = c.id_compra
                    INNER JOIN cliente cl on c.id_cliente = cl.id_cliente
                    WHERE dc.id_compra = :id_compra";
                $stmt = $this->con->prepare($sql);
                $stmt -> bindParam(':id_compra', $id_compra, PDO::PARAM_INT);
                $stmt->execute();

                $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($clientes as $key => $cliente){
                    $sql = "SELECT p.nombre,
                                dp.cantidad,
                                p.p_publico,
                                pa.nombre as paqueteria
                            FROM detalle_compra dp
                            INNER JOIN producto p on dp.id_producto = p.id_producto
                            INNER JOIN compra c on dp.id_compra= c.id_compra
                            INNER JOIN paqueteria pa on c.id_paqueteria=pa.id_paqueteria
                            WHERE c.id_compra = :id_compra;";
                     $stmt = $this->con->prepare($sql);
                     $stmt -> bindParam(':id_compra', $cliente['id_compra'], PDO::PARAM_INT);
                     $stmt->execute();
                     $productos[$key] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                $content = include('comprobante.php');
            }else{
                $content = 'No se puede mostrar el reporte';
            }
            return $content;
        }
    }

    $comprobante = new Comprobante;
?>