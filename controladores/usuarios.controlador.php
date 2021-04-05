<?php

    class ControladorUsuarios {

        static public function ctrMostrarUsuarios($item, $valor){
            $tabla = 'vendedores';
            $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
            return $respuesta;
        }

    }