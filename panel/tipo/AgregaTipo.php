<?php require_once('../../cabeceras/headerAdm.php'); ?>

<h1><?php echo(isset($id_tipo))? "Modificar ": "Nevo ";?>Tipo</h1>
<div class="conteiner">
    <div class="row">
        <div class="col">
            <form method="POST" action="ctrlTipo.php?accion=<?php echo(isset($id_tipo))? "update&id_tipo=".$id_tipo: "add";?>" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label id="inputAddress">Tipo</label>
                            <input type="text" name="tipo" value="<?php echo(isset($id_tipo)) ? $datos['tipo']:"";?>" class="form-control" required />
                        </div>
                    </div>
                </div>
                    <input class="btn btn-success" type="submit" value="Guardar" />
                    <a href="ctrlTipo.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php require_once('../../cabeceras/footer.php');?>