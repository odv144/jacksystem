function ayuda2(Key,model)
{
	datos  = '{"prueba":"mi asunto"}';
	$.ajax({
				type:"POST",
				url:"productos/rta2",
				dataType:'json',
				data:datos,
			
			})
			.done(function(){
				alert('en una parte');
			})
			.always(function(){
				aleet('probando otras cosas');
			})
}
function ayuda(key, model)
{
	
	/* 
	esto funciona descomentando
	
	datos = '<table><tr><td>';
	datos += '<h2><p>'+key+'</p></h2>';
	datos +='</td></tr></table>';
	$("#grid-pro").html(datos);
	*/
	var targetUrl ='index.php?r=productos/rta';
	var id = key+1;
	//var data_agre= $('#grid-pro').data('agre');
	//alert($data_agre);
	$.get(targetUrl, { id: id }, function(data) {

		// Ubicamos el valor de 'texto' que estaba en el JSON en el input 
		//data  = $.parseJSON(data);
		alert(data);
		//var imp = '<tr><td>'+data.detalle+'</td></tr>';
		//$('#productos').html('<tr><td id="id"></td></tr>');
		
		//$('#productos td#id').html(imp);
		$('#grid-pro').attr('data-agre',data);
		$('#grid-pro').html(data);

	});                   
}

function llamar()
{

	alert('pasando por aca');
			var datos=$('.panel-body').serialize();
			$.ajax({
				type:"POST",
				url:"ventas/rta",
				data:datos,
				success:function(r){
					if(r==1){
						alert("agregado con exito");
					}else{
						alert("Fallo el server");
					}
				}
			});

			return false;
}





function calculo(valor)//permite calcular el total que es cantidad * p_U * iva y asignarle a Total
{
	var can,p_u,iva,subtotal;

	//can = parseInt($('div.can input').attr('value'));
	var total = $('#Total').attr('value');
	total = (total == null || total == undefined || total == '') ? 0 : total;
	can= parseInt(valor);
	p_u = $('div.p_u div input').attr('value');
	subtotal=0;
	if(p_u == null || p_u == undefined || p_u == '')
		p_u=1;
	else 
		p_u = parseInt(p_u);

	iva  = 0.21;

	if( total ==0) 
	{
		subtotal  = can * p_u+(p_u * iva);
		
	$('#Total').attr('value',subtotal);
	}else
		{
		total = parseInt($('#Total').attr('value'));
		subtotal =can*p_u+(iva*p_u); 
		total = total +subtotal;
		$('#Total').attr('value',total);
		}
	/*
	alert() $('div.can div input').attr('value');

	alert(can);

	alert(($('div.can input').attr('id')));
	*/
}

function sumar (valor) {
//    var total = 0;  
    valor = parseInt(valor); // Convertir el valor a un entero (número).
    
    //total = document.getElementById('div.can input').valueL;
    total = $('#Total').value;
    alert(total);
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

function pruebas(val)
{
	//$("#prueba").attr('value',val);
	 $.post( "http://www.jacksistema.odv/index.php?r=productos/listas&id="+val, function() {
                                      $( "#prueba" ).attr("value","otra cosa");
                                    });

                                  
}
/*************************************************************************/
/*
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
	
*/
/******/
