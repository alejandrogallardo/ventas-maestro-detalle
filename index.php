<?php
    require_once 'controladores/plantilla.controlador.php';
    require_once 'controladores/clientes.controlador.php';
    require_once 'controladores/productos.controlador.php';
    require_once 'controladores/ventas.controlador.php';
    require_once 'controladores/usuarios.controlador.php';
    require_once 'controladores/mediospago.controlador.php';
    
    require_once 'modelos/clientes.modelo.php';
    require_once 'modelos/productos.modelo.php';
    require_once 'modelos/ventas.modelo.php';
    require_once 'modelos/usuarios.modelo.php';
    require_once 'modelos/mediospago.modelo.php';

    $plantilla = new ControllerPlantilla();

    $plantilla -> crtPlantilla();