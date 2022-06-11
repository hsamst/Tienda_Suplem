<?php
require_once '../../cabeceras/header.php';
require_once '../productos/mdlProducto.class.php';
$productos = $producto->read();?>
    <div class="id">
        <div class="container">
            <div class="row" style="margin:20px">
                <div class="col">
                    <div class="row row-cols-1 row-cols-md-4">
                        <?php foreach ($productos as $key => $producto): ?>
                        <div class="shop-card" style="margin:20px">
                            <div class="title">
                                <?php echo $producto['nombre'];?>
                            </div>
                            <div class="slider">
                                <figure data-color="#E24938, #A30F22">
                                    <div class="imagenPro">
                                        <img src="../../image/imagProduc/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="Img_Producto">
                                    </div>
                                </figure>
                            </div>
                            <div class="cta">
                                <div class="price" style="margin-bottom:20px">Precio: $ <?php echo $producto['p_publico'].".00 MXN"; ?></div>
                            </div>
                            <a href="../../panel/login/login.php"  name="comprar" class="btn bi bi-cart3">Comprar<span class="bg"></span></a>
                        </div>
                        <?php endforeach;?>
</div>
                    </div>
                </div>
            </div>
        </div>
       <?php require_once '../../cabeceras/footer.php';?>