<?php
require_once '../Sistema.class.php';
class Producto extends Sistema
{

    public $id_producto;
    public $nombre;
    public $descripcion;
    public $p_mayoreo;
    public $p_medio_mayoreo;
    public $p_publico;
    public $stok;
    public $imagen;

    public function getId_producto()
    {
        return $this->id_producto;
    }

    public function setId_producto($id_producto)
    {
        $this->id_producto = $id_producto;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getP_mayoreo()
    {
        return $this->p_mayoreo;
    }

    public function setP_mayoreo($p_mayoreo)
    {
        $this->p_mayoreo = $p_mayoreo;
        return $this;
    }

    public function getP_medio_mayoreo()
    {
        return $this->p_medio_mayoreo;
    }

    public function setP_medio_mayoreo($p_medio_mayoreo)
    {
        $this->p_medio_mayoreo = $p_medio_mayoreo;
        return $this;
    }

    public function getP_publico()
    {
        return $this->p_publico;
    }

    public function setP_publico($p_publico)
    {
        $this->p_publico = $p_publico;
        return $this;
    }

    public function getStok()
    {
        return $this->stok;
    }

    public function setStok($stok)
    {
        $this->stok = $stok;
        return $this;
    }

    /**
     * Get the value of fotografia
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of fotografia
     *
     * @return  self
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
        return $this;
    }
    /* Metodos proncipales para la manipulacion de la informacion (CRUD)*/

    /**
     * Recuperar todos los ponentes
     *
     * @return  array
     */
    public function read()
    {
        $this->connect();
        $sql = "SELECT p.id_producto, p.imagen,
            p.nombre, p.descripcion,
            p.p_mayoreo, p.p_medio_mayoreo,
            p.p_publico, p.stok,
            t.tipo, pr.nombre as NomProveedor
            from producto p
            JOIN tipo t on p.id_tipo=t.id_tipo
            JOIN proveedor pr on p.id_proveedor=pr.id_proveedor
            ORDER BY p.id_producto;";
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
    public function readOne($id_producto)
    {
        $this->connect();
        $sql = "SELECT p.id_producto, p.imagen,
            p.nombre, p.descripcion,
            p.p_mayoreo, p.p_medio_mayoreo,
            p.p_publico, p.stok,
            t.tipo, pr.nombre as NomProveedor
            from producto p
            JOIN tipo t on p.id_tipo=t.id_tipo
            JOIN proveedor pr on p.id_proveedor=pr.id_proveedor
                    WHERE p.id_producto=:id_producto;";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $datos = (isset($datos[0])) ? $datos[0] : null;
        return $datos;
    }

    public function create($datos)
    {
        $this->connect();
        $archivo = $this->cargarImagen("imagen", "../../image/imagProduc/");
        if (is_null($archivo)) {
            $sql = "INSERT INTO producto (nombre,
                                            descripcion,
                                            p_mayoreo,
                                            p_medio_mayoreo,
                                            p_publico,
                                            stok,
                                            id_tipo,
                                            id_proveedor)
                        VALUES (:nombre,
                                :descripcion,
                                :p_mayoreo,
                                :p_medio_mayoreo,
                                :p_publico,
                                :stok,
                                :id_tipo,
                                :id_proveedor)";
        } else {
            $sql = "INSERT INTO producto (nombre,
                                            descripcion,
                                            p_mayoreo,
                                            p_medio_mayoreo,
                                            p_publico,
                                            stok,
                                            id_tipo,
                                            id_proveedor,
                                            imagen)
                    VALUES (:nombre, :descripcion, :p_mayoreo, :p_medio_mayoreo, :p_publico, :stok, :id_tipo, :id_proveedor, :imagen)";
        }
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':p_mayoreo', $datos['p_mayoreo'], PDO::PARAM_INT);
        $stmt->bindParam(':p_medio_mayoreo', $datos['p_medio_mayoreo'], PDO::PARAM_INT);
        $stmt->bindParam(':p_publico', $datos['p_publico'], PDO::PARAM_INT);
        $stmt->bindParam(':stok', $datos['stok'], PDO::PARAM_INT);
        $stmt->bindParam(':id_tipo', $datos['id_tipo'], PDO::PARAM_INT);
        $stmt->bindParam(':id_proveedor', $datos['id_proveedor'], PDO::PARAM_INT);
        if (!is_null($archivo)) {
            $stmt->bindParam(':imagen', $archivo, PDO::PARAM_STR);
        }
        $rs = $stmt->execute();
        return $stmt->rowCount();
    }

    public function update($datos, $id_producto)
    {
        $this->connect();
        $archivo = $this->cargarImagen("imagen", "../../image/imagProduc/");
        if (is_null($archivo)) {
            $sql = "UPDATE producto set
                            nombre=:nombre,
                            descripcion=:descripcion,
                            p_mayoreo=:p_mayoreo,
                            p_medio_mayoreo=:p_medio_mayoreo,
                            p_publico=:p_publico,
                            stok=:stok,
                            id_tipo=:id_tipo,
                            id_proveedor=:id_proveedor
                            WHERE id_producto = :id_producto";
        } else {
            $sql = "UPDATE producto set
                nombre=:nombre,
                descripcion=:descripcion,
                p_mayoreo=:p_mayoreo,
                p_medio_mayoreo=:p_medio_mayoreo,
                p_publico=:p_publico,
                stok=:stok,
                id_tipo=:id_tipo,
                id_proveedor=:id_proveedor
                imagen =  :imagen
                WHERE id_producto = :id_producto";
        }

        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':p_mayoreo', $datos['p_mayoreo'], PDO::PARAM_INT);
        $stmt->bindParam(':p_medio_mayoreo', $datos['p_medio_mayoreo'], PDO::PARAM_INT);
        $stmt->bindParam(':p_publico', $datos['p_publico'], PDO::PARAM_INT);
        $stmt->bindParam(':stok', $datos['stok'], PDO::PARAM_INT);
        $stmt->bindParam(':id_tipo', $datos['id_tipo'], PDO::PARAM_INT);
        $stmt->bindParam(':id_proveedor', $datos['id_proveedor'], PDO::PARAM_INT);
        $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
        if (!is_null($archivo)) {
            $stmt->bindParam(':imagen', $archivo, PDO::PARAM_STR);
        }
        $rs = $stmt->execute();
        return $stmt->rowCount();
    }
    public function updatestok($stokcomprado, $id_producto){
        $this->connect();
        $sql = "UPDATE producto SET 
                    stok =(SELECT sum(stok) - sum($stokcomprado) FROM producto
                    WHERE id_producto = :id_producto)
                    WHERE id_producto = :id_producto";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':stok', $stokcomprado, PDO::PARAM_INT);
            $stmt -> bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
    }




    public function delete($id_producto)
    {
        $this->connect();
        $sql = "DELETE FROM producto WHERE id_producto=:id_producto";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
        $rs = $stmt->execute();
        return $stmt->rowCount();

    }
}
$producto = new Producto();
