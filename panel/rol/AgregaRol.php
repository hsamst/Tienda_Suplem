<?php require_once('../../cabeceras/headerAdm.php'); ?>

<h1><?php echo(isset($id_rol))? "Modificar ": "Nevo ";?>Rol</h1>
<div class="conteiner">
    <div class="row">
        <div class="col">
            <form method="POST" action="ctrlRol.php?accion=<?php echo(isset($id_rol))? "update&id_rol=".$id_rol: "add";?>" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label id="inputAddress">Rol</label>
                            <input type="text" name="rol" value="<?php echo(isset($id_rol)) ? $datos['rol']:"";?>" class="form-control" required />
                        </div>
                    </div>
                </div>
                    <input class="btn btn-success" type="submit" value="Guardar" />
                    <a href="ctrlRol.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php require_once('../../cabeceras/footer.php');?>