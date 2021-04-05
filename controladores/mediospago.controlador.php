<?php

class ControladorMediosDePago{

    /*=============================================
    MOSTRAR MEDIOS DE PAGO
    =============================================*/

    static public function ctrMostrarMediosDePago($item, $valor){

        $tabla = "medios_de_pago";
       
        $respuesta = ModeloMediosDePago::mdlMostrarMediosDePago($tabla, $item, $valor);

        return $respuesta;

    }

}