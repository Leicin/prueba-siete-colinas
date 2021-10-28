<?php
include 'Conexion.php';
include '../entidades/usuario.php';
include '../entidades/empleado.php';



class UsuarioDao extends Conexion
{

    protected static $cnx;


    private static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    /**
     * Metodo que sirve para validar el login
     */

    public static function login($usuario)
    {

        $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";


        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $usu = $usuario->getUsuario();
        $pass = $usuario->getPassword();

        $resultado->bindValue(":usuario", $usu);
        $resultado->bindValue(":password", $pass);

        $resultado->execute();
        /**
         * Evitar Inyecciones sql
         */
        if ($resultado->rowCount() > 0) {
            $filas = $resultado->fetch();
            if (
                $filas["usuario"] == $usuario->getUsuario()
                && $filas["password"] == $usuario->getPassword()


            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Metodo que sirve para obtener un usuario
     */

    public static function getUsuario($usuario)
    {

        $query = "SELECT id_usuario,nombre,usuario,email,password,privilegio,fecha_registro FROM usuarios WHERE usuario = :usuario AND password = :password";


        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $usu = $usuario->getUsuario();
        $pass = $usuario->getPassword();

        $resultado->bindValue(":usuario", $usu);
        $resultado->bindValue(":password", $pass);

        $resultado->execute();

        $filas = $resultado->fetch();

        $usuario = new Usuarios();
        $usuario->setId_usuario($filas["id_usuario"]);
        $usuario->setNombre($filas["nombre"]);
        $usuario->setUsuario($filas["usuario"]);
        $usuario->setEmail($filas["email"]);
        $usuario->setPassword($filas["password"]);
        $usuario->setPrivilegio($filas["privilegio"]);
        $usuario->setFecha_registro($filas["fecha_registro"]);


        return $usuario;
    }

    /**
     * Metodo que sirve para Registrar usuarios
     */

    public static function registrar($usuario)
    {

        $query = "INSERT INTO usuarios (
        nombre,usuario,email,password,privilegio) VALUES
        (:nombre, :usuario, :email, :password, :privilegio)";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);


        $resultado->bindValue(":nombre", $usuario->getNombre());
        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":email", $usuario->getEmail());
        $resultado->bindValue(":password", $usuario->getPassword());
        $resultado->bindValue(":privilegio", $usuario->getPrivilegio());

        if ($resultado->execute()) {

            return true;
        }

        return false;
    }

    public static function getListarusuarios()
    {

        $query = "SELECT id_usuario,nombre,usuario,email,password,privilegio,fecha_registro FROM usuarios";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filasusuarios = $resultado->fetchAll();


        return $filasusuarios;
    }



    public static function registrar_empleado($empleado)
    {

        $query = "INSERT INTO empleados (
        fecha_ingreso,fecha_liquidacion,id_usuario,dias_vacaciones) VALUES
        (:fecha_ingreso, :fecha_liquidacion, :id_usuario, :dias_vacaciones)";

   
        self::getConexion();

        $resultado = self::$cnx->prepare($query);


        $resultado->bindValue(":fecha_ingreso", $empleado->getFecha_ingreso());
        $resultado->bindValue(":fecha_liquidacion", $empleado->getFecha_liquidacion());
        $resultado->bindValue(":id_usuario", $empleado->getId_usuario());
        $resultado->bindValue(":dias_vacaciones", $empleado->getDias_vacaciones());

   

        if ($resultado->execute()) {

            return true;
        }

        return false;
    }


    public static function getListarvacaciones()
    {

        $query =   $query = "SELECT  * from empleados ORDER by id_empleado DESC
        LIMIT 1";
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filasvacaciones = $resultado->fetchAll();


        return $filasvacaciones;
    }


    public static function getTodasvacaciones()
    {

        $query =   $query = "SELECT  * from empleados";
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filastodas = $resultado->fetchAll();


        return $filastodas;
    }
}


    // public static function vacaciones($fecha_liquidacion, $fecha_ingreso)
    // {

    //     // $query = "SELECT (TIMESTAMPDIFF(day,'" . $fecha_liquidacion . ",'" .  fecha_ingreso  . "')/30) * 1.25 AS 'dias_vacaciones'      
    //     // FROM empleado WHERE id_empleado = id";
    //     $query = "SELECT (DATEDIFF('" . $fecha_ingreso . "', '" . $fecha_liquidacion . "')/30) * 1.25;";                
    //     self::getConexion();
    //     $resultado = self::$cnx->prepare($query);        
    //     $resultado->execute();
    //     $filasvacaciones = $resultado->fetchAll();        
    //     return $filasvacaciones;
    // }
