<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ventas Maestro Detalle</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="vistas/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>
<body class="hold-transition sidebar-collapse sidebar-mini">



<!-- Site wrapper -->
<div class="wrapper">
  <?php
    
    if (isset($_GET["ruta"]))
    {
      
      if( $_GET["ruta"] == "inicio" ||
          $_GET["ruta"] == "usuarios" ||
          $_GET["ruta"] == "categorias" ||
          $_GET["ruta"] == "productos" ||
          $_GET["ruta"] == "clientes" ||
          $_GET["ruta"] == "ventas" ||
          $_GET["ruta"] == "crear-venta" ||
          $_GET["ruta"] == "reportes")
      {
        include 'modulos/'.$_GET["ruta"].'.php';
      }else {
        include 'modulos/404.php';
      }
    } else {
      include 'modulos/inicio.php';
    }

  ?>
</div>
<!-- ./wrapper -->



<!-- jQuery -->
<script src="vistas/dist/js/jquery-3.6.0.js"></script>
<!-- Bootstrap 4 -->
<script src="vistas/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/popper.min.js"></script>
<!-- Personalizado -->
<script src="vistas/js/plantilla.js"></script>

</body>
</html>
