<?php

include '../controlador/UsuarioControlador.php';


session_start();



header("Content-type: application/json");
$resultado = array();
$diasVacaciones = array();


/**
 * Organismo
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["txtfecha_contratacion"]) && isset($_POST["txtfecha_liquidacion"])  && isset($_POST["txtid"])) {
        
        $txtfecha_contratacion = ($_POST["txtfecha_contratacion"]);
        $txtfecha_liquidacion = ($_POST["txtfecha_liquidacion"]);
        $txtid = ($_POST["txtid"]);
        $txtfecha_contratacionDate = new DateTime($txtfecha_contratacion);
        $txtfecha_liquidacionDate = new DateTime($txtfecha_liquidacion);
        
       
        $diasVacaciones = ($txtfecha_contratacionDate->diff($txtfecha_liquidacionDate)->days / 30 * 1.25);
       

        
        $resultado = array("estado" => "true");        
        
        if (UsuarioControlador::registrar_empleado($txtfecha_contratacion, $txtfecha_liquidacion, $txtid, $diasVacaciones)) {
            
            
            
            header("location:usuario.php");
        }
    }
} else {


    header("location:prueba.php?error=1");
}
