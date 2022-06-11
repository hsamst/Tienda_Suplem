<?php require_once '../../cabeceras/headerAdm.php';?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 style="text-align: center"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
  <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
</svg>Usuarios</h1>
        <h4><i class="bi bi-person-plus"></i>  Agrega un usuario</h4>
      </div>
    </div>
    <form method="POST" action="ctrlUsuario.php?accion=add" enctype="multipart/form-data">
    <div class="row">
      <div class="col">
        <input type="text" name="correo" class="form-control" required/>
      </div>
       <div class="col">
       <input type="password" name="contrasena" id="password" class="form-control">
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
            <th scope="col">correo</th>
            <th scope="col">contraseña</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($datos as $key => $dato): ?>
          <tr>
            <th scope="row"><?php echo $dato['id_usuario']; ?></th>
                <td><?php echo $dato['correo']; ?></td>
                <td><?php echo $dato['contrasena']; ?></td>
                <td>
                    <div>
                    <i class="btn btn-info bi-pencil"><a href="ctrlUsuario.php?accion=modify&id_usuario=<?php echo $dato['id_usuario']; ?>">Modificar</a></i>
                    <i class="btn btn-secondary bi bi-trash"><a href="ctrlUsuario.php?accion=delete&id_usuario=<?php echo $dato['id_usuario']; ?>">Eliminar</a></i>
        </div>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
      </table>
  </div>
</div>
<?php require_once '../../cabeceras/footer.php';?>