<?php


function getPrivilegio($p)
{

    $privilegio = "";
    switch ($p) {
        case 1:
            $privilegio = "Administrador";
            break;

        case 2:
            $privilegio = "Usuario";
            break;

        default:
            $privilegio = "- No definido -";
            break;

            
    }

    return $privilegio;
}
