<?php

require_once "conexion.php";

class ModeloMediosDePago{
    /*=============================================
	MOSTRAR MEDIOS DE PAGO
	=============================================*/

    static public function mdlMostrarMediosDePago($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT MP_Id, UPPER(MP_Descripcion) as 'MP_Descripcion' FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;

    }

}