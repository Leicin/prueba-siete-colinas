<?php

session_start();

if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["privilegio"] == 2) {
        header("location:usuario.php");
    }
} else {
    header("location:logueo.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Metrolegal</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">


</head>

<body>



    <?php


    include "../controlador/UsuarioControlador.php";
    $filastodas = UsuarioControlador::getTodas_vacaciones();




    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">


        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>

        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <a id="a_metrolegal" class="navbar-brand text-white"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>

            <p style=" margin-bottom: 4px;">
                <a id="btn_cerrar" href="cerrar_sesion.php" class="btn btn-outline-light  btn-lg ">Cerrar sesion</a>
            </p>
        </div>
    </nav>

    <br>




    <div id="contenedor_jumbotron" class="container text-center mt-2">
        <div class="jumbotron">

            <h1 class="display-2"><strong>¡Bienvenido!</strong> <?php echo $_SESSION["usuario"]["nombre"]; ?></h1>
            <p class="mt-4 display-4">Siete Colinas Soluciones<span class="badge badge-dark"> <?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Admin' : 'Empleado'; ?></span></p>


        </div>

    </div>


    <div class="container">
        <div class="col-md-12">
            <table class="table table-hover table-bordered style=" width 100%">
                <thead class="thead-primary">
                    <tr>
                        <th scope="col">id empleado</th>
                        <th scope="col">Fecha ingreso</th>
                        <th scope="col">Fecha liquidaciòn</th>
                        <th scope="col">id usuario</th>
                        <th scope="col">dias de vacaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($filastodas as $valor) {  ?>
                        <tr>
                            <td><?php echo $valor["id_empleado"] ?></td>
                            <td><?php echo $valor["fecha_ingreso"] ?></td>
                            <td><?php echo $valor["fecha_liquidacion"] ?></td>
                            <td><?php echo $valor["id_usuario"] ?></td>
                            <td><?php echo $valor["dias_vacaciones"] ?></td>


                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>







    <script src="../jquery/jquery-3.4.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../popper/popper.min.js"></script>

    <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../codigo.js"></script>
</body>

</html>