<?php

include '../modelos/UsuarioDao.php';

class UsuarioControlador
{

    public static function login($usuario, $password)
    {

        $obj_usuario = new Usuarios();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);

        return UsuarioDao::login($obj_usuario);
    }

    public static function getUsuario($usuario, $password)
    {

        $obj_usuario = new Usuarios();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);

        return UsuarioDao::getUsuario($obj_usuario);
    }

    public static function registrar($nombre, $usuario, $email, $password, $privilegio)
    {

        $obj_usuario = new Usuarios();
        $obj_usuario->setNombre($nombre);
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setEmail($email);
        $obj_usuario->setPassword($password);
        $obj_usuario->setPrivilegio($privilegio);

        return UsuarioDao::registrar($obj_usuario);
    }

    public static function getListusuarios()
    {

        return UsuarioDao::getListarusuarios();
    }




    public static function registrar_empleado($fecha_ingreso, $fecha_liquidacion, $id_usuario, $dias_vacaciones)
    {

        $obj_empleado = new Empleado();
        $obj_empleado->setFecha_ingreso($fecha_ingreso);
        $obj_empleado->setFecha_liquidacion($fecha_liquidacion);
        $obj_empleado->setId_usuario($id_usuario);
        $obj_empleado->setDias_vacaciones($dias_vacaciones);

    
       

        return UsuarioDao::registrar_empleado($obj_empleado);
    }
    
    public static function getListvacaciones()
    {

        return UsuarioDao::getListarvacaciones();
    }

    public static function getTodas_vacaciones()
    {

        return UsuarioDao::getTodasvacaciones();
    }
}
