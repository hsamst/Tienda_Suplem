<?php require_once '../../cabeceras/headerAdm.php';?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Rol</h1>
        <h4>Agrega un rol</h4>
      </div>
    </div>
    <form method="POST" action="ctrlRol.php?accion=add" enctype="multipart/form-data">
    <div class="row">
      <div class="col">
        <input type="text" name="rol" class="form-control" required />
      </div>
       <div class="col">
        <input class="btn btn-primary" type="submit" value="Guardar" />
      </div>
    </div>
</form>
    <div class="row">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Rol</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($datos as $key => $dato): ?>
          <tr>
            <th scope="row"><?php echo $dato['id_rol']; ?></th>
                <td><?php echo $dato['rol']; ?></td>
                <td>
                    <div>
                    <i class="btn btn-info bi-pencil"><a href="ctrlRol.php?accion=modify&id_rol=<?php echo $dato['id_rol']; ?>">Modificar</a></i>
                    <i class="btn btn-secondary bi bi-trash"><a href="ctrlRol.php?accion=delete&id_rol=<?php echo $dato['id_rol']; ?>">Eliminar</a></i>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
  </div>
</div>
<?php require_once '../../cabeceras/footer.php';?>