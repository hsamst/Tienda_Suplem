<?php require_once('../../cabeceras/header.php'); ?>

<h1><?php echo(isset($id_tipo_p))? "Modificar ": "Nevo ";?>Tipo de pago</h1>
<div class="conteiner">
    <div class="row">
        <div class="col">
            <form method="POST" action="ctrlTipPago.php?accion=<?php echo(isset($id_tipo_p))? "update&id_tipo_p=".$id_tipo_p: "add";?>" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label id="inputAddress" for="tipo">Tipo de pago</label>
                            <input type="text" name="tipo_p" value="<?php echo(isset($id_tipo_p)) ? $datos['tipo_p']:"";?>" class="form-control" required autofocus autocomplete />
                        </div>
                    </div>
                </div>
                    <input class="btn btn-success" type="submit" value="Guardar" />
                    <a href="ctrlTipPago.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php require_once('../../cabeceras/footer.php');?>