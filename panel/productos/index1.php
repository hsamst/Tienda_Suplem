
<?php require_once('../../cabeceras/headerAdm.php'); ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Nuestros productos</h1>
      </div>
    </div>    
    <a href="ctrlProducto.php?accion=new" class="btn btn-primary"> Añadir nuevo producto</a>
    <div class="row">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio mayoreo</th>
            <th scope="col">Precio medio mayoreo</th>
            <th scope="col">Precio publico</th>
            <th scope="col">Stok</th>
            <th scope="col">Tipo</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>

        <?php foreach ($datos as $key => $dato):?>
          <tr>
            <th scope="row"><?php echo $dato['id_producto']; ?></th>
                <td>
                    <div class="text-center">
                        <img src="../../image/imagProduc/<?php echo $dato['imagen']; ?>" class="img-circle" width="200"  alt="suple">
                    </div>
                </td>
                <td><?php echo $dato['nombre']; ?></td>
                <td><?php echo $dato['descripcion']; ?></td>
                <td><?php echo $dato['p_mayoreo']; ?></td>
                <td><?php echo $dato['p_medio_mayoreo']; ?></td>
                <td><?php echo $dato['p_publico']; ?></td>
                <td><?php echo $dato['stok']; ?></td>
                <td><?php echo $dato['tipo']; ?></td>
                <td><?php echo $dato['NomProveedor']; ?></td>
                <td>  
                    <div>
                    <i class="btn btn-info bi-pencil"><a href="ctrlProducto.php?accion=modify&id_producto=<?php echo $dato['id_producto']; ?>">Modificar</a></i>
                    <i class="btn btn-secondary bi bi-trash"><a href="ctrlProducto.php?accion=delete&id_producto=<?php echo $dato['id_producto']; ?>">Eliminar</a></i>
                    </div>
                </td>
            </tr>

            <?php
                endforeach;
            ?>
        </tbody>
      </table>  
  </div>
</div>
<?php require_once('../../cabeceras/footer.php');?>