<?php

class ControladorVentas {

    /*=============================================
    CREAR VENTA
    =============================================*/

    static public function ctrCrearVenta(){

        $tabla = "ventas";

        $datos = array(
            "Ven_Cli_Id"   => $_POST["Ven_Cli_Id"],
            "Ven_Vnrs_Id"  => $_POST["Ven_Vnrs_Id"],
            "Ven_Factura"  => $_POST["Ven_Factura"],
            "Ven_Total"    => $_POST["Ven_Total"],
            "listaProductos"   => $_POST["listaProductos"],
            "metodos_pago"  => $_POST["listaMetodosPago"]
        );

        $respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);

        if($respuesta == "ok"){

            echo'VENTA GUARDADA CON EXITO';

        }

        

    }

}