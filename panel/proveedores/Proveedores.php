<?php require_once('../../cabeceras/headerAdm.php'); ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Lista de Proveedores</h1>
      </div>
    </div>   
    <a href="ctrlProveedor.php?accion=new" class="btn btn-primary"><i class="bi bi-person-plus"></i>  Añadir nuevo proveedor</a> 
    <div class="row">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($datos as $key => $dato):?>
          <tr>
            <th scope="row"><?php echo $dato['id_proveedor']; ?></th>
                <td><?php echo $dato['nombre']; ?></td>
                <td><?php echo $dato['correo']; ?></td>
                <td><?php echo $dato['telefono']; ?></td>
                <td>  
                    <div class="">
                    <i class="btn btn-info bi-pencil"><a href="ctrlProveedor.php?accion=modify&id_proveedor=<?php echo $dato['id_proveedor']; ?>">Modificar</a></i>
                    <i class="btn btn-secondary bi bi-trash"><a href="ctrlProveedor.php?accion=delete&id_proveedor=<?php echo $dato['id_proveedor']; ?>">Eliminar</a></i>
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