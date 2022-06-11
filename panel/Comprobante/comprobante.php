<?php
    $content = "
    <h1>"."Fecha: ".$datos['fecha']."&nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;&nbsp;"." Id_Compra"." ".$datos['id_compra']."</h1>";
    
    foreach ($clientes as $key => $cliente):
        $content.="<h4>"."Nombre del cliente: ".$cliente['Nombre_Cliente']."</h4>"."
        <br />
    <br />
    <h3>Productos &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Cantidad &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Precio &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; paqueteria &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</h3>";
        foreach ($productos[$key] as $key2 => $producto):
            $content.=$producto['nombre']."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;".$producto['cantidad']."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;".$producto['p_publico']."mnx"."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" .$producto['paqueteria']."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;"."";
            $content.="<br>";
        endforeach;
        $content.="<hr />";
    endforeach;
    return $content;
?>