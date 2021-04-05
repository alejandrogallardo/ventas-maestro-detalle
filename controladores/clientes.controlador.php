<?php

class ControladorClientes{

    /*=============================================
    MOSTRAR CLIENTES
    =============================================*/

    static public function ctrMostrarClientes($item, $valor){

        $tabla = "clientes";

        $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

        return $respuesta;

    }
}