<?php
require_once '../../cabeceras/headerClien.php';
require_once '../productos/mdlProducto.class.php';
require_once('../paqueteria/mdlPaqueteria.class.php');
$paqueterias=$paqueteria->read();
$productos = $producto->read();?>
    <div class="id">
        <div class="container">
            
            <div class="row" style="margin:20px">
                <div class="col">
                    <div class="row row-cols-1 row-cols-md-4">
                        <?php foreach ($productos as $key => $producto): ?>
                            <form method="POST" action="ctrlVistaCliente.php?accion=shop&id_producto=<?php echo $producto['id_producto']; ?>" enctype="multipart/form-data">
                                                <div class="shop-card" style="margin:20px">
                                                      <div class="title">
                                                            <?php echo $producto['nombre'];?>
                                                      </div>
                                                      <div class="desc">
                                                            Tipo: <?php echo $producto['tipo']; ?>
                                                      </div>
                                                      <div class="slider">
                                                            <figure data-color="#E24938, #A30F22">
                                                                  <div class="imagenPro">
                                                                        <img id="img-producto" src="../../image/imagProduc/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="Img_Producto">
                                                                  </div>
                                                            </figure>
                                                      </div>

                                                      <div class="cta">
                                                            <div class="price" style="margin-bottom:20px">Precio: $ <?php echo $producto['p_publico'].".00 MXN"; ?></div>
                                                                  <div class="input-group mb-2">
                                                                        <div class="input-group-prepend">
                                                                              <div class="input-group-text">Stock <?php echo $producto['stok']; ?> Uds </div>
                                                                        </div>

                                                                        <select class="custom-select" id="stokcomprado" name="stokcomprado" required>
                                                                              <option  value="1" selected> 1 Ud</option>
                                                                              <option  value="2"> 2 Uds </option>
                                                                              <option  value="3"> 3 Uds </option>
                                                                        </select>     
                                                                  </div>

                                                                  <div class="input-group mb-2">
                                                                        <div class="input-group-prepend">
                                                                              <div class="input-group-text"> Paqueteria </div>
                                                                        </div>
                                                                        <select style="margin-bottom: 10px" class="custom-select" id="validatedInputGroupSelect" name="id_paqueteria" required >
                                            <option selected>Seleccione una paqueteria</option>
                                            <?php foreach ($paqueterias as $key => $value): 
                                            $selected = "";
                                                if($value['nombre'] == $paqueterias['nombre']):
                                                $selected = "selected";
                                                endif;
                                            ?>
                                            <option value="<?php echo $value['id_paqueteria'];?>" <?php echo $selected; ?>> <?php echo $value['nombre']?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                                                  </div>
                                                            <button href="../../panel/login/login.php" name="comprar"class="btn bi bi-cart3" id="btnCompra" type="submit" value="Comprar">Comprar<span class="bg"></span></button>
                                                      </div>
                                                </div>
                                          </form>
                            
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
       <?php require_once '../../cabeceras/footer.php';?>