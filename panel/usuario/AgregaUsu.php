<?php require_once('../../cabeceras/headerAdm.php'); ?>

<h1><?php echo(isset($id_rol))? "Modificar ": "Nevo ";?>Usuario</h1>
<div class="conteiner">
    <div class="row">
        <div class="col">
            <form method="POST" action="ctrlUsuario.php?accion=<?php echo(isset($id_usuario))? "update&id_usuario=".$id_usuario: "add";?>" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label id="inputAddress1">Correo</label>
                            <input type="text" name="correo" value="<?php echo(isset($id_usuario)) ? $datos['correo']:"";?>" class="form-control" required />
                        </div>
                        <div class="col">
                            <label id="inputAddress2">Contraseña</label>
                            <input type="password" name="contrasena" value="<?php echo(isset($id_usuario)) ? $datos['contrasena']:"";?>" class="form-control" required />
                        </div>
                    </div>
                </div>
                    <input class="btn btn-success" type="submit" value="Guardar" />
                    <a href="ctrlUsuario.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php require_once('../../cabeceras/footer.php');?>