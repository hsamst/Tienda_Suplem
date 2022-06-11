<?php
    require_once('../Sistema.class.php');

    class Ventas extends Sistema{
        
        public function read(){
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
                    GROUP by c.id_compra;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

    }  

    $ventas = new Ventas();

?>