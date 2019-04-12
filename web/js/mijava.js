var total = 0;  
function sumar (valor) {
//    var total = 0;  
    valor = parseInt(valor); // Convertir el valor a un entero (número).
    
    total = document.getElementById('spTotal').innerHTML;
    
    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero '0'.
    total = (total == null || total == undefined || total == '') ? 0 : total;
    
    /* Esta es la suma. */
    total = (parseInt(total) + parseInt(valor));
    
    // Colocar el resultado de la suma en el control 'span'.
    //document.getElementById('spTotal').innerHTML = total;
    document.getElementById("Total").value = total;
}
function total()
{
    valor = parseInt(valor); // Convertir el valor a un entero (número).
    
    total = document.getElementById('spTotal').innerHTML;
    
    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero '0'.
    total = (total == null || total == undefined || total == '') ? 0 : total;
    
    /* Esta es la suma. */
    total = (parseInt(total) + parseInt(valor));
    
    // Colocar el resultado de la suma en el control 'span'.
    //document.getElementById('spTotal').innerHTML = total;
    document.getElementById("Total").value = total;
}
/*************************************************************************/
$(function() {
						$("#nombre_cliente").autocomplete({
							source: "./ajax/autocomplete/clientes.php",
							minLength: 2,
							select: function(event, ui) {
								event.preventDefault();
								$('#id_cliente').val(ui.item.id_cliente);
								$('#nombre_cliente').val(ui.item.nombre_cliente);
								$('#tel1').val(ui.item.telefono_cliente);
								$('#mail').val(ui.item.email_cliente);
																
								
							 }
						});
						 
						
					});
					
	$("#nombre_cliente" ).on( "keydown", function( event ) {
						if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
						{
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
											
						}
						if (event.keyCode==$.ui.keyCode.DELETE){
							$("#nombre_cliente" ).val("");
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
						}
			});	
	

/******/