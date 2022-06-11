<?php require_once('../../cabeceras/headerSinMen.php'); ?>
<div class="row" id="contenedor" style="background-color:#f7f7f7">
    <div class="col">
    <div class="container" >
    <div id="login">
        <div class="row" style="margin:50px">
            <div class="col"></div>
            <div class="col">
            <img id="imgfooter1" src="../../image/logF.png" alt="lgo"/>
            </div>
            <div class="col"></div>
        </div>
        <div class="contain">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form method="POST" action="ctrlLogin.php?accion=login">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Correo:</label><br>
                                <input type="text" name="correo" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="contrasena" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-primary" value="Iniciar" style="margin-bottom:50px"/>
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="../registroClien/ctrlCliente.php" class="text-info">Register here</a>
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
<?php require_once('../../cabeceras/footer.php');?>