<?php
    class Conexion {
        static public function conectar(){
            $link = new PDO('mysql:host=localhost;port=3307;dbname=ejercicio_ventas', 'perro', '123456');
            $link->exec('set names utf8');
            return $link;
        }
    }