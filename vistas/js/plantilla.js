$('#agregaProductos').on('change', function(){
    
    var idProd = $('#agregaProductos').val();
   
    var datos = new FormData();
    
     datos.append("idProducto", idProd);

    console.log('Prod ID ', idProd);

    $.ajax({
        url:"ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            
            console.log('Respuesta: ', respuesta);
            var producto = respuesta["Prod_Descripcion"];
            var precio = respuesta["Prod_Precio"];
            var idp = respuesta["Prod_Id"];
            

            $('.datosuser').append(
                '<div class="row mt-2 orden">' +
                    '<div class="col-sm-6">' +
                        '<label class="visually-hidden" for="specificSizeInputName">Producto</label>' +
                        '<input type="text" class="form-control producto" prodid="'+idp+'" id="specificSizeInputName" value="'+producto+'">' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                        '<label class="visually-hidden" for="precio">Precio</label>' +
                        '<input type="text" class="form-control precio" id="precio" value="'+precio+'" readonly>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                        '<label class="visually-hidden" for="cantidad">Cantidad</label>' +
                        '<input type="number" class="form-control cantidad" id="Cantidad" min="1" value="1">' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                        '<label class="visually-hidden" for="total">Sub Total</label>' +
                        '<input type="text" class="form-control subtotal" id="subtotal" total value="'+precio+'" readonly>' +
                    '</div>' +
                '</div>'
            )
            
            $('.cantidad').on('change', sumaStotal);

            function sumaStotal() {
                $('.orden').each(function(){    
                    var precio = $(this).find('div:eq(1) input.precio[type = text]').val();     
                    var cantidad = $(this).find('div:eq(2) input.cantidad[type = number]').val();
                    
                    var xTotal = parseInt(precio) * parseInt(cantidad);
                    var sTotal = xTotal.toString();

                    $(this).find('div:eq(3) input.subtotal[type = text]').val(sTotal);   
                    
                });
                addOrder();
            }
            
            addOrder();
        }     
    })
    
});


$('#agregaPago').on('change', function(){

    var idPago = $('#agregaPago').val();
    $('.mediospago').append(
        '<div class="input-group mt-2 ">'+
            '<div class="input-group-prepend">'+
                '<span class="input-group-text"><i class="fab fa-quora"></i></span>'+
            '</div>'+
    
            '<input type="text" mpid="'+idPago+'" class="form-control mediopago" placeholder="0.00">'+
    
        '</div>'
    )

    $('.mediopago').on('change', function(){
        listarMediosPagos()
    })
    listarMediosPagos()
})

function listarMediosPagos(){
    var listaMediosPago = [];
    var mediospago = $('.mediopago');

    for(var i = 0; i < mediospago.length; i++){
        listaMediosPago.push(
            { "MPD_MP_Id" : $(mediospago[i]).attr('mpid'),
              "MPD_Importe" : $(mediospago[i]).val()
        })
    }
    
    $("#listaMetodosPago").val(JSON.stringify(listaMediosPago));

}

$('.marca').on('keyup', buscar);

function buscar(event) {
    var ev = window.event || event;
    var data = $('.nombre').val()
    $('.titulo').html(data)
 }

 function addOrder() {
    listOrder = [];
    var ordenes = $('.orden');
    var producto = $('.producto');
    var cantidad = $('.cantidad');
    var subtotal = $('.subtotal');

    for(var i = 0; i < ordenes.length; i++){
        listOrder.push({
            "VenD_Prod_Id": $(producto[i]).attr('prodid'),
            "VenD_Cantidad": $(cantidad[i]).val(),
            "VenD_Total": $(subtotal[i]).val()
        })
    }
    
    var total = 0;
    listOrder.forEach(element => {
        total = total + Number(element.VenD_Total);
    });
 
    $('#total').val(total);

    $("#listaProductos").val(JSON.stringify(listOrder));
 }