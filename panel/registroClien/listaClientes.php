<?php require_once('../../cabeceras/header.php'); ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Nuestros clientes</h1>
      </div>
    </div>    
    <a href="ctrlCliente.php?accion=new" class="btn btn-primary"> Añadir nuevo cliente</a>
    <div class="row">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Primer apellido</th>
            <th scope="col">Segundo apellido</th>
            <th scope="col">Direccion</th>
            <th scope="col">Ciudad</th>
            <th scope="col">C. P.</th>
            <th scope="col">Telefono</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($datos as $key => $dato):?>
          <tr>
            <th scope="row"><?php echo $dato['id_cliente']; ?></th>
                <td><?php echo $dato['nombre']; ?></td>
                <td><?php echo $dato['apaterno']; ?></td>
                <td><?php echo $dato['amaterno']; ?></td>
                <td><?php echo $dato['direccion']; ?></td>
                <td><?php echo $dato['ciudad']; ?></td>
                <td><?php echo $dato['cp']; ?></td>
                <td><?php echo $dato['telefono']; ?></td>
                <td>  
                    <lu>
                    <i class="btn btn-success bi-pencil"><a href="ctrlCliente.php?accion=modify&id_cliente=<?php echo $dato['id_cliente']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="ctrlCliente.php?accion=delete&id_cliente=<?php echo $dato['id_cliente']; ?>">Eliminar</a></i>
                    </lu>
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