<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";


class AjaxProductos{

    /*=============================================
    EDITAR o MOSTRAT PRODUCTOS
    =============================================*/

    public $idProducto;
    public $traerProductos;
    public $nombreProducto;
    

    public function ajaxEditarProducto(){

        if($this->traerProductos == "ok"){
    
            $item = null;
            $valor = null;

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

            echo json_encode($respuesta);


        }else if($this->nombreProducto != ""){

            $item = "descripcion";
            $valor = $this->nombreProducto;

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

            echo json_encode($respuesta);

        }else{

            $item = "Prod_Id";
            $valor = $this->idProducto;

           

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

            echo json_encode($respuesta);

        }

    }

}

if(isset($_POST["idProducto"])){

    $editarProducto = new AjaxProductos();
    $editarProducto -> idProducto = $_POST["idProducto"];
    $editarProducto -> ajaxEditarProducto();

}

if(isset($_POST["traerProductos"])){

    $traerProductos = new AjaxProductos();
    $traerProductos -> traerProductos = $_POST["traerProductos"];
    $traerProductos -> ajaxEditarProducto();

}







