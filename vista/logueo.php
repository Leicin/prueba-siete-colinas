


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">


</head>

<body>

    <div id="login">

        <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">

      

            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>

            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <a id="a_metrolegal" class="navbar-brand text-white"></a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    <li class="nav-item active">
                        <a id="a_login" class="nav-link text-white" href="logueo.php">Login <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a id="a_login" class="nav-link text-white" href="registro.php">Registro<span class="sr-only">(current)</span></a>
                    </li>
               
                </ul>
            </div>
        </nav>

        <div class="container"  style="margin-top: 60px;">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12 bg-light text-dark">

                        <form id="loginForm" action="validarCode.php" method="POST">
                            <h1 id="sesion" class="text-center text-dark">Iniciar sesion</h1>

                            <div class="form-group mt-3">
                                <label for="usuario" class="text-dark">Usuario</label>
                                <input type="text" name="txtUser" id="usuario" required autofocus placeholder="Usuario" class="form-control">
                            </div>

                            <div class="form-group mt-3">
                                <label for="password" class="text-dark">Contraseña</label>
                                <input type="password" name="txtClave" id="password" required placeholder="****" class="form-control">
                            </div>

                            <div class="form-gropu text-center mt-5">
                                <input type="submit" name="submit" class="btn btn-danger btn-lg btn-block" value="Ingresar">


                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



  

    


    <script src="../jquery/jquery-3.4.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../popper/popper.min.js"></script>

    <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../js/codigo.js"></script>
</body>

</html>

