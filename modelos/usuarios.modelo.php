<?php

    require_once 'conexion.php';

    class ModeloUsuarios{

        static public function MdlMostrarUsuarios($tabla, $item, $valor){

            if($item != null){
                $stmt = Conexion::conectar()->prepare("select * from $tabla where $item = :$item");
                $stmt -> bindParam(':'.$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetch();
            }else{
                $stmt = Conexion::conectar()->prepare("select * from $tabla");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }

            $stmt->close();

            $stmt = null;

        }

    }