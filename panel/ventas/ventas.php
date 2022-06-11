<h1 style="text-align: center"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
</svg>¡Mis Ventas!</h1>
    <div class="row">
        <div class="col">
            <div class="col">
            <table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
                <thead>
                        <tr>
                        <th scope="col">Id cliente</th>
                        <th scope="col">Nombre</th> 
                        <th scope="col">Correo</th>
                        <th scope="col">Id compra</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Opciones</th>
                        </tr>
                </thead>
                <tbody>
                        <?php foreach ($MisVenta as $key => $venta): ?>
                            <tr>
                                
                                <td ><?php echo $venta['id_cliente']?></td>
                                <td ><?php echo $venta['nombre']?></td>
                                <td ><?php echo $venta['correo']?></td>
                                <td ><?php echo $venta['id_compra']?></td>
                                <td><?php echo $venta['fecha']?></td>
                                <td><i class="btn btn-info"><a href="../Comprobante/CtrlComprobante.php?accion=Comprobante&id_compra=<?php echo $venta['id_compra']; ?>">Imprimir tikect</a></i></td>
                                
                            </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
            </div>
            <div class="col">
        </div>
    </div>
  </div>