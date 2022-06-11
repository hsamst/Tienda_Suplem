<?php require_once('../../cabeceras/headerAdm.php'); ?>

<h1><?php echo(isset($id_proveedor))? "Modificar ": "Nevo ";?>Proveedor</h1>
<div class="conteiner">
    <div class="row">
        <div class="col">
            <form method="POST" action="ctrlProveedor.php?accion=<?php echo(isset($id_proveedor))? "update&id_proveedor=".$id_proveedor: "add";?>" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label id="inputAddress">Nombre</label>
                            <input type="text" name="nombre" value="<?php echo(isset($id_proveedor)) ? $datos['nombre']:"";?>" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                            <label id="inputCorreo">Correo</label>
                            <input type="text" name="correo" value="<?php echo(isset($id_proveedor)) ? $datos['correo']:"";?>" class="form-control" required />
                         </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="inputtel">telefono</label>
                        <input type="number" name="telefono" value="<?php echo(isset($id_proveedor)) ? $datos['telefono']:"";?>" class="form-control" required />
                    </div>
                </div>
                    <input class="btn btn-info" type="submit" value="Guardar" />
                    <a href="ctrlProveedor.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php require_once('../../cabeceras/footer.php');?>