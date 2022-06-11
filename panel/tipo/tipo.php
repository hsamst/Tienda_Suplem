<?php require_once '../../cabeceras/headerAdm.php';?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Tipo</h1>
        <h4>Agrega un tipo de producto</h4>
      </div>
    </div>
    <form method="POST" action="ctrlTipo.php?accion=add" enctype="multipart/form-data">
    <div class="row">
      <div class="col">
        <input type="text" name="tipo" class="form-control" required />
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
            <th scope="col">tipo</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($datos as $key => $dato): ?>
          <tr>
            <th scope="row"><?php echo $dato['id_tipo']; ?></th>
                <td><?php echo $dato['tipo']; ?></td>
                <td>
                    <div>
                    <i class="btn btn-info bi-pencil"><a href="ctrlTipo.php?accion=modify&id_tipo=<?php echo $dato['id_tipo']; ?>">Modificar</a></i>
                    <i class="btn btn-secondary bi bi-trash"><a href="ctrlTipo.php?accion=delete&id_tipo=<?php echo $dato['id_tipo']; ?>">Eliminar</a></i>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
  </div>
</div>
<?php require_once '../../cabeceras/footer.php';?>