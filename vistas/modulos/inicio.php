<div class="container">

  <h1 class="text-center text-uppercase mt-3">Ventas Maestro Detalle</h1>

  <form class="row g-3 border mt-5 p-5 d-flex flex-column" method="post">
  
    <div class="row">
        <!-- Seleccionar Clientes -->
      <div class="col-md-4">
        <label for="inputState" class="form-label">Clientes</label>
        <!-- <select id="inputState" class="form-control"> -->
        <select id="seleccionarCliente" name="Ven_Cli_Id" class="form-control">
          <option selected>--- Seleccionar Cliente ---</option>
          <?php

            $item = null;
            $valor = null;

            $cliente_dpi = '';

            $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

            
            foreach ($clientes as $key => $value) {
              
              echo '<option value="'.$value["Cli_Id"].'">'.$value["Cli_Nombre"].'</option>';
              
              
            }
            
            ?>
        </select>
      </div>
      <!-- fin Seleccionar Clientes -->
    
      <!-- Cliente DPI -->
      <div class="col-md-6">
          <label for="dpi" class="form-label">DPI</label>
          <input type="text" class="form-control" id="dpi" readonly>
      </div>
      <!-- Fin Cliente DPI -->

      <!-- Seleccionar Vendedor -->
      <div class="col-md-4">
        <label for="inputState" class="form-label">Vendedor</label>
        <select id="inputState" name="Ven_Vnrs_Id" class="form-control">
          <option selected>--- Seleccionar Vendedor ---</option>
          <?php

            $item = null;
            $valor = null;
            $vendedores = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
            
            foreach ($vendedores as $key => $value) {
              
              echo '<option value="'.$value["Vnrs_Id"].'">'.$value["Vnrs_Nombre"].'</option>';

            }
            
          ?>
        </select>
      </div>
      <!-- fin Seleccionar Vendedor -->

      <!-- Código Vendedor -->
      <div class="col-md-6">
        <label for="dpi" class="form-label">Código</label>
        <input type="text" class="form-control" id="dpi" readonly>
      </div>
      <!-- Fin Código Vendedor -->


      <!-- No. Factura -->
      <div class="col-md-6">
        <label for="factura" class="form-label">No. Factura</label>
        <input type="text" class="form-control" id="factura" name="Ven_Factura">
      </div>
      <!-- Fin No. Factura -->
  
    </div>


    <div class="row datosuser p-3 border mt-3"></div>
    <input type="hidden" id="listaProductos" name="listaProductos">
    
    <div class="row mediospago p-3 border mt-3"></div>
    <input type="hidden" id="listaMetodosPago" name="listaMetodosPago">

    <div class="row controles mt-3">
      <div class="col-auto">
          <button type="submit" class="btn btn-success enviar">Guardar</button>
      </div>

      <div class="col-auto">
          <select class="form-control" id="agregaProductos">
          <option selected>--- Productos ---</option>
          <?php

            $item = null;
            $valor = null;

            $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

            foreach ($productos as $key => $value) {
              
              echo '<option value="'.$value["Prod_Id"].'">'.$value["Prod_Descripcion"].'</option>';

            }

          ?>
          </select>
      </div>
      
      <div class="col-auto">
          <select class="form-control" id="agregaPago">
          <option selected>--- Forma de Pago ---</option>
          <?php

            $item = null;
            $valor = null;

            $mediospago = ControladorMediosDePago::ctrMostrarMediosDePago($item, $valor);
            
            foreach ($mediospago as $key => $value) {
            
              echo '<option value="'.$value["MP_Id"].'">'.$value["MP_Descripcion"].'</option>';

            }

          ?>
          </select>
      </div>


      <div class="col-md-3 input-group">
          <label for="dpi" class="form-label mr-2">TOTAL: </label>
          <input type="text" class="form-control" id="total" name="Ven_Total" readonly>
      </div>

    </div>
  </form>

  <?php

    $guardarVenta = new ControladorVentas();
    $guardarVenta -> ctrCrearVenta();

  ?>

</div>