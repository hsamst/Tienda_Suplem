<?php require_once '../../cabeceras/headerAdm.php';?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Tipos de Pago</h1>
        <h4>Agrega un tipo de pago</h4>
      </div>
    </div>
    <form method="POST" action="ctrlTipPago.php?accion=add" enctype="multipart/form-data">
    <div class="row">
      <div class="col">
        <input type="text" name="tipo_p" class="form-control" required autofocus autocomplete />
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
            <th scope="col">tipo pago</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($datos as $key => $dato): ?>
          <tr>
            <th scope="row"><?php echo $dato['id_tipo_p']; ?></th>
                <td><?php echo $dato['tipo_p']; ?></td>
                <td>
                    <lu>
                    <i class="btn btn-info bi-pencil"><a href="ctrlTipPago.php?accion=modify&id_tipo_p=<?php echo $dato['id_tipo_p']; ?>">Modificar</a></i>
                    <i class="btn btn-secondary bi bi-trash"><a href="ctrlTipPago.php?accion=delete&id_tipo_p=<?php echo $dato['id_tipo_p']; ?>">Eliminar</a></i>
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