<?php require_once('../../cabeceras/headerAdm.php');
?>
<h1><?php echo(isset($id_producto))? "Modificar ": "Nevo ";?>Producto</h1>

<?php 
    if(isset($id_producto)){
      ?>
      <div class="text-center">
        <img src="../../image/imagProduc/<?php echo $datos['imagen']; ?>" class="img-circle" width="500" style="border-radius:300px"  alt="img_persona">
      </div>
      <?php
    }
?>
<div class="conteiner">
    <div class="row">
        <div class="col">
        <form method="POST" action="ctrlProducto.php?accion=<?php echo(isset($id_producto))? "update&id_producto=".$id_producto: "add"; ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" value="<?php echo(isset($id_producto)) ? $datos['nombre']:"";?>" class="form-control" required autofocus autocomplete />
                        </div>
                        <div class="col">
                            <label for="descripcion">Descripción</label>
                            <input type="text" name="descripcion" value="<?php echo(isset($id_producto)) ? $datos['descripcion']:"";?>" class="form-control" required autofocus autocomplete />
                        </div>
                        <div class="col">
                            <label for="tipoPro">Tipo de producto</label>
                            <select class="custom-select" id="validatedInputGroupSelect" name="id_tipo" required >
                                <option selected>Choose...</option>
                                <?php foreach ($datostip as $key => $value): 
                                $selected = "";
                                    if($value['tipo'] == $datos['tipo']):
                                    $selected = "selected";
                                    endif;
                                ?>
                                <option value="<?php echo $value['id_tipo'];?>" <?php echo $selected; ?>> <?php echo $value['tipo']?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="proveedor">Proveedor</label>
                            <select class="custom-select" id="validatedInputGroup" name="id_proveedor" required >
                                <option selected>Choose...</option>
                                <?php foreach ($datosprove as $key => $value): 
                                $selected = "";
                                    if($value['nombre'] == $datos['NomProveedor']):
                                    $selected = "selected";
                                    endif;
                                ?>
                                <option value="<?php echo $value['id_proveedor'];?>" <?php echo $selected; ?>> <?php echo $value['nombre']?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="p_mayoreo">Precio Mayoreo</label>
                            <input type="number" name="p_mayoreo" value="<?php echo(isset($id_producto)) ? $datos['p_mayoreo']:"";?>" class="form-control" required autofocus autocomplete />
                        </div>
                        <div class="col">
                            <label for="p_medio_mayoreo">P. Medio mayoreo</label>
                            <input type="number" name="p_medio_mayoreo" value="<?php echo(isset($id_producto)) ? $datos['p_medio_mayoreo']:"";?>" class="form-control" required autofocus autocomplete />
                        </div>
                        <div class="col">
                            <label for="p_publico">Precio publico</label>
                            <input type="number" name="p_publico" value="<?php echo(isset($id_producto)) ? $datos['p_publico']:"";?>" class="form-control" required autofocus autocomplete />
                        </div>
                        <div class="col">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" value="<?php echo(isset($id_producto)) ? $datos['stok']:"";?>" class="form-control" required autofocus autocomplete />
                        </div>
                    </div>
                </div>
                
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile"name="imagen">
                    <label class="custom-file-label" for="customFile">Selecciona una foto</label>
                </div>
                <input class="btn btn-primary" type="submit" value="Guardar" />
                <a href="ctrlProducto.php" class="btn btn-info">Cancelar</a>
        </form>
        </div>
    </div>
</div>
<?php require_once('../../cabeceras/footer.php');?>