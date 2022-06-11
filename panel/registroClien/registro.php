<?php require_once '../../cabeceras/headerSinMen.php';?>
<div class="row" id="contenedor" style="background-color:#f7f7f7">
    <div class="col">
    <div class="container" >
    <div id="login">
    <div class="row" style="margin:50px">
        <div class="col"></div>
        <div class="col">
            <img id="imgfooter3" src="../../image/logF.png" alt="logo"/>
        </div>
        <div class="col"></div>
        </div>
        <div class="contain">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    <form method="post" action="ctrlCliente.php?accion=register">
                            <h3 class="text-center text-info">Register</h3><br>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="apaterno" placeholder="Primer apellido">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="amaterno" placeholder="Segundo Apellido">
                                </div>
                            </div>
                        <br>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" name="direccion" placeholder="Direccion">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" name="ciudad" placeholder="Ciudad">
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="cp" placeholder="C.P.">
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="telefono" placeholder="Telefono o celular.">
                                    </div>
                                </div>
                            <br>
                            <div class="row">
                                    <div class="col">
                                        <input type="email" class="form-control" name="correo" placeholder="E-mail">
                                    </div>
                                        <div class="col">
                                        <input type="password" name="contrasena" id="password" class="form-control">
                                            <small id="passwordHelpInline" class="text-muted">
                                            Must be 8-20 characters long.
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-success" type="submit" value="register" />
                                    <a href="../login/ctrlLogin.php" class="btn btn-danger">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<?php require_once '../../cabeceras/footer.php';?>