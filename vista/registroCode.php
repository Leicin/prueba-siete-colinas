<?php

include '../controlador/UsuarioControlador.php';


session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtNombre"]) && isset($_POST["txtUsuario"]) &&
        isset($_POST["txtEmail"]) && isset($_POST["txtPassword"]) && isset($_POST["txtPrivilegio"])
    ) {

        $txtNombre = ($_POST["txtNombre"]);
        $txtUsuario = ($_POST["txtUsuario"]);
        $txtEmail =  ($_POST["txtEmail"]);
        $txtPassword =  ($_POST["txtPassword"]);
        $txtPrivilegio = ($_POST["txtPrivilegio"]);




        if (UsuarioControlador::registrar($txtNombre, $txtUsuario, $txtEmail, $txtPassword, $txtPrivilegio)) {


            $usuario = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);
            $_SESSION["usuario"] = array(
                "id_usuario" => $usuario->getId_usuario(),
                "nombre" => $usuario->getNombre(),
                "usuario" => $usuario->getUsuario(),
                "email" => $usuario->getEmail(),
                "privilegio" => $usuario->getPrivilegio(),

            );

            header("location:admin.php");
        }
    }
} else {

    header("location:registro.php?error=1");
}
