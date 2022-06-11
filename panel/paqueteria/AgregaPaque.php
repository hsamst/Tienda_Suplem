<?php require_once('../../cabeceras/headerAdm.php'); ?>

<h1><?php echo(isset($id_paqueteria))? "Modificar ": "Nevo ";?>Modificar paqueteria</h1>
<div class="conteiner">
    <div class="row">
        <div class="col">
            <form method="POST" action="ctrlPaqueteria.php?accion=<?php echo(isset($id_paqueteria))? "update&id_paqueteria=".$id_paqueteria: "add";?>" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label id="inputAddress">Paqueteria</label>
                            <input type="text" name="nombre" value="<?php echo(isset($id_paqueteria)) ? $datos['nombre']:"";?>" class="form-control" required/>
                        </div>
                    </div>
                </div>
                    <input class="btn btn-success" type="submit" value="Guardar" />
                    <a href="ctrlPaqueteria.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php require_once('../../cabeceras/footer.php');?>