<?php

class Conexion {
    
    /**
     * Conexion a la base de datos
     */
        public static function Conectar() {
    
            try {
    
                $cn = new PDO("mysql:host=localhost;dbname=siete_colinas","root", "");
    
               return $cn;
    
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
    
        }
    
    }

