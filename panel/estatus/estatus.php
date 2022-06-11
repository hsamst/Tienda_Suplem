<?php require_once '../../cabeceras/headerAdm.php';?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Estatus</h1>
        <h4>Agrega un estatus</h4>
      </div>
    </div>
    <form method="POST" action="ctrlEstatus.php?accion=add" enctype="multipart/form-data">
    <div class="row">
      <div class="col">
        <input type="text" name="descripcion" class="form-control" required autofocus autocomplete />
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
            <th scope="col">descripcion</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($datos as $key => $dato): ?>
          <tr>
            <th scope="row"><?php echo $dato['id_estatus']; ?></th>
                <td><?php echo $dato['descripcion']; ?></td>
                <td>
                    <lu>
                    <i class="btn btn-info bi-pencil"><a href="ctrlEstatus.php?accion=modify&id_estatus=<?php echo $dato['id_estatus']; ?>">Modificar</a></i>
                    <i class="btn btn-secundary bi bi-trash"><a href="ctrlEstatus.php?accion=delete&id_estatus=<?php echo $dato['id_estatus']; ?>">Eliminar</a></i>
                    </lu>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
      </table>
    </table>
  </div>
</div>
<?php require_once '../../cabeceras/footer.php';?>