<?php

require_once "conexion.php";

class ModeloVentas {

    /*=============================================
    REGISTRO DE VENTA
    =============================================*/

    static public function mdlIngresarVenta($tabla, $datos){

        $dbh = Conexion::conectar();

        try {   
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
            $dbh -> beginTransaction();
            
            /*$cliente = $datos["Ven_Cli_Id"];
            $vendedor = $datos["Ven_Vnrs_Id"];
            $factura = $datos["Ven_Factura"];
            $total = $datos["Ven_Total"];

            $stmt = "INSERT INTO $tabla(Ven_Cli_Id, Ven_Vnrs_Id, Ven_Factura, Ven_Total) VALUES ('$cliente', '$vendedor', '$factura', '$total')";
            
            $dbh -> exec ( $stmt );*/

            $stmt = $dbh->prepare("INSERT INTO $tabla(Ven_Cli_Id, Ven_Vnrs_Id, Ven_Factura, Ven_Total) VALUES (:Ven_Cli_Id, :Ven_Vnrs_Id, :Ven_Factura, :Ven_Total)");

            $stmt->bindParam(":Ven_Cli_Id", $datos["Ven_Cli_Id"], PDO::PARAM_INT);
            $stmt->bindParam(":Ven_Vnrs_Id", $datos["Ven_Vnrs_Id"], PDO::PARAM_INT);
            $stmt->bindParam(":Ven_Factura", $datos["Ven_Factura"], PDO::PARAM_INT);
            $stmt->bindParam(":Ven_Total", $datos["Ven_Total"], PDO::PARAM_STR);
            $stmt->execute();

            $lastinsertid = $dbh->lastInsertId();

            $listaProductos = json_decode($datos["listaProductos"], true);

            foreach ($listaProductos as $key => $value) {
                $prodId = $value["VenD_Prod_Id"];
                $cantidad = $value["VenD_Cantidad"];
                $total = $value["VenD_Total"];
                $stmt = "INSERT INTO ventas_detalle(VenD_Ven_Id, VenD_Prod_Id, VenD_Cantidad, VenD_Total) VALUES ('$lastinsertid', '$prodId', '$cantidad', '$total')";
                $dbh -> exec ( $stmt );
            }
            
            $listaPagos = json_decode($datos["metodos_pago"], true);

            foreach ($listaPagos as $key => $value) {
                $metodo = $value["MPD_MP_Id"];
                $importe = $value["MPD_Importe"];
                $stmt = "INSERT INTO medios_de_pago_detalle(MPD_Ven_Id, MPD_MP_Id, MPD_Importe) VALUES ('$lastinsertid', '$metodo', '$importe')";
                $dbh -> exec ( $stmt );
            }

            $dbh -> commit ();

            return "ok";
        } catch ( Exception $e ) {
            $dbh -> rollBack ();
            return "error";
        } 
        
        // finally {
        //     $dbh->close();
        //     $dbh = null;
        // }

        $dbh->close();
        $dbh = null;

    }

}






















/*if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;*/