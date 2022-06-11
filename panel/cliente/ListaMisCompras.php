<h1> ¡Mis Compras! </h1>
<h3>Hola, <?php echo $comprasCli[0]['nombre'];?> estas son tus compras</h3>
    <div class="row">
        <div class="col">
            <div class="col">
                <table class="table" id="Tbamis_compras" >
                    <thead>
                        <tr>
                        <th scope="col">ID Compra</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Comprobante</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            foreach ($comprasCli as $key => $compra):
                        ?>
                        <tr>
                            <td><?php echo $compra['id_compra']?></td>
                            <td><?php echo $compra['fecha']?></td>
                            <td><i class="btn btn-primary"><a href="../Comprobante/ctrlComprobante.php?accion=Comprobante&id_compra=<?php echo $compra['id_compra']; ?>">Imprimir comprobante</a></i></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
                            </div>
                            </div>