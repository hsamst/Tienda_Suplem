<?php require_once('../../cabeceras/header.php'); ?>

<h1><?php echo(isset($id_estatus))? "Modificar ": "Nevo ";?>Estatus</h1>
<div class="conteiner">
    <div class="row">
        <div class="col">
            <form method="POST" action="ctrlEstatus.php?accion=<?php echo(isset($id_estatus))? "update&id_estatus=".$id_estatus: "add";?>" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label id="inputAddress" for="descripcion">Estatus</label>
                            <input type="text" name="descripcion" value="<?php echo(isset($id_estatus)) ? $datos['descripcion']:"";?>" class="form-control" required autofocus autocomplete />
                        </div>
                    </div>
                </div>
                    <input class="btn btn-success" type="submit" value="Guardar" />
                    <a href="ctrlEstatus.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php require_once('../../cabeceras/footer.php');?>