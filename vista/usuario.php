<?php

session_start();

if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["privilegio"] == 1) {
        header("location:admin.php");
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

    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


</head>

<body>


    <?php


    include "../controlador/UsuarioControlador.php";
    $filasusuarios = UsuarioControlador::getListusuarios();
    $filasvacaciones = UsuarioControlador::getListvacaciones();



    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top ">


        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>

        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <a id="a_metrolegal" class="navbar-brand text-white"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">





            </ul>

            <p style="margin-bottom: 4px;">
                <a id="btn_cerrar" href="cerrar_sesion.php" class="btn btn-outline-light  btn-lg ">Cerrar sesion</a>
            </p>
        </div>


    </nav>


    </div>
    </nav>

    <br>



    <div id="contenedor_jumbotron" class="container text-center " style="margin-top: 100px;">
        <div class="jumbotron">

            <h1 class="display-2"><strong>¡Bienvenido!</strong> <?php echo $_SESSION["usuario"]["nombre"]; ?></h1>
            <p class="mt-4 display-4">Siete Colinas Soluciones<span class="badge badge-dark"> <?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Admin' : 'Empleado'; ?></span></p>


        </div>

    </div>

    <div class="container">
        <form class="ml-5" action="registroEmpleado.php" method="POST" id="info">
            <h1 class="text-center" style="font-family: 'Courier New', Courier, monospace;">Informaciòn del empleado</h1>
            <div class="row">
                <div class="col">
                    <label for="party" style="font-size: 20px; font-weight:900; padding: 10px;">Fecha de contrataciòn</label>
                    <input type="date" id="datePickerId" name="txtfecha_contratacion" />
                </div>

                <div class="col">
                    <label for="party" style="font-size: 20px; font-weight:900; padding: 10px;">Fecha de liquidaciòn</label>
                    <input type="date" name="txtfecha_liquidacion" />
                </div>



            </div>

            <div class="col">
                <tr>

                    <td><textarea class="form-control" hidden name='txtid' rows="1"><?php echo $_SESSION["usuario"]["id_usuario"]; ?></textarea></td>
                </tr>
            </div>

            <div class="col">
                <tr>

                    <td><textarea class="form-control" hidden name='diasvacaciobes' rows="1"><?php echo $_SESSION["usuario"]["id_usuario"]; ?></textarea></td>
                </tr>
            </div>

            

            <div class=" text-center mt-3 mb-5">
                <input style="margin-left: -55px;" type="submit" name="submit" class="btn btn-success btn-lg" value="Enviar">
            </div>
        </form>

    </div>



    <div class="col-xl-2 col-md-2 col-lg-2 mt-5 container-fluid table-responsive" style="width: 100%;">

        <table class="table  table-hover ">
            <thead style="background-color: #b11317; color: white">
                <tr>
                
                    <th scope="col" id="colu">Dias de vacaciones</th>


                </tr>
            </thead>
            <tbody class="table-striped">
                <?php foreach ($filasvacaciones as $valor) {  ?>
                    <tr>
                        <td><?php echo $valor["dias_vacaciones"] ?></td>

                    </tr>
                <?php  } ?>
            </tbody>
        </table>











        <script>
            datePickerId.max = new Date().toISOString().split("T")[0];
        </script>
        <script src="../jquery/jquery-3.4.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../popper/popper.min.js"></script>

        <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
        <script src="../js/info.js"></script>
</body>

</html>