<?php require_once '../../cabeceras/headerAdm.php';?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Paqueterias</h1>
        <h4>Agrega una paqueteria</h4>
      </div>
    </div>
    <form method="POST" action="ctrlPaqueteria.php?accion=add" enctype="multipart/form-data">
    <div class="row">
      <div class="col">
        <input type="text" name="nombre" class="form-control" required />
      </div>
       <div class="col">
        <input class="btn btn-success" type="submit" value="Guardar" />
      
      </div>
    </div>
</form>
    <div class="row">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">paqueteria</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($datos as $key => $dato): ?>
          <tr>
            <th scope="row"><?php echo $dato['id_paqueteria']; ?></th>
                <td><?php echo $dato['nombre']; ?></td>
                <td>
                    <div>
                    <i class="btn btn-info bi-pencil"><a href="ctrlPaqueteria.php?accion=modify&id_paqueteria=<?php echo $dato['id_paqueteria']; ?>">Modificar</a></i>
                    <i class="btn btn-secondary bi bi-trash"><a href="ctrlPaqueteria.php?accion=delete&id_paqueteria=<?php echo $dato['id_paqueteria']; ?>">Eliminar</a></i>
        </div>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
  </div>
</div>
<?php require_once '../../cabeceras/footer.php';?>