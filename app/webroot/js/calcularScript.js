$(function(){

	//Pagina add
	var ok = 'glyphicon glyphicon-ok';
	var duvida = 'glyphicon glyphicon-question-sign'; // ?
	var nao = 'glyphicon glyphicon-remove'; // X
	$("#cepDestino").keypress(verificaNumero);
	$('tr:odd').addClass('success');
	$('tr:odd').mouseenter(function(){
	$(this).removeClass('success').addClass('active');		
	}).mouseleave(function(){
	$(this).removeClass('active').addClass('success');
	});
	$('#criarCalc').prop('disabled', true);
	$(".rowDados").css('cursor', 'pointer').click(function(){
	  				$(".container_1").toggle();
	  				
	  			});

		$(".rowEnvio").css('cursor', 'pointer').click(function(){
	  				$(".container_2").toggle();
	  				
	  			});
	$(".container_1").bind("click focus", function(){
		$('.dadosProd').removeClass(nao);
		$('.dadosProd').removeClass(ok);
		$('.dadosProd, .rowDados').css('color', '#666');
	
	});
$(".container_2").bind("click focus", function(){
		$('.enviProd').removeClass(nao);
		$('.enviProd').removeClass(ok);
		$('.enviProd, .rowEnvio').css('color', '#666');
	
	});

	
				$("#pesoProd").keypress(verificaNumero);
                $("#comprimentoProd").keypress(verificaNumero);
                $("#larguraProd").keypress(verificaNumero);
                $("#alturaProd").keypress(verificaNumero);
                $("#diametroProd").keypress(verificaNumero);
                $("#valorDeclarado").keypress(verificaNumero);
                $("#taxaAdicional").keypress(verificaNumero);
                $("#telefone").keypress(verificaNumero);
                $("#cepOrigem").keypress(verificaNumero);
                
                //CEP Origem
				$("#cepOrigem").blur(function(){
						if(tamanho(8,8, '#' + $(this).attr('id'))){
						$(this).removeClass('correto').addClass('error');
						$(this).val('');
						$('#criarCalc').prop('disabled', true);
						$("#msg").html('O CEP contém 8 digitos!');
						

						}else{
							$(this).removeClass('error').addClass('correto');
							$("#msg").html('');
						}
				});
				//Comprimento
				$("#comprimentoProd").blur(function(){
						if(tamanho(1,4, '#' + $(this).attr('id'))){
							$(this).val('');
							$("#msg").html('Digite o comprimento do produto!');
						$(this).removeClass('correto').addClass('error');
						}else{
							if(centimetros(16,105,'#' + $(this).attr('id'))){
								$(this).val('');
								$(this).removeClass('correto').addClass('error');
								$("#msg").html('Comprimento.: Mínimo de 16cm, Máximo de 105cm');
							}else{
							$(this).removeClass('error').addClass('correto');
							$("#msg").html('');
						}
						}
				});
				// Altura
				$("#alturaProd").blur(function(){
						if(tamanho(1,4, '#' + $(this).attr('id'))){
							$(this).val('');
							$("#msg").html('Digite a altura do produto!');
						$(this).removeClass('correto').addClass('error');
						}else{

							if(centimetros(2,105,'#' + $(this).attr('id'))){
								$(this).val('');
								$(this).removeClass('correto').addClass('error');	
								$("#msg").html('Altura.: Mínimo de 2cm, Máximo de 105cm');
							}else{
							$(this).removeClass('error').addClass('correto');
							$("#msg").html('');
						}
						}
				});
				//Largura
					$("#larguraProd").blur(function(){
						if(tamanho(1,4, '#' + $(this).attr('id'))){
							$(this).val('');
							$("#msg").html('Digite a largura do produto!');
						$(this).removeClass('correto').addClass('error');
						}else{
						if(centimetros(11,105,'#' + $(this).attr('id'))){
							$(this).val('');
						$(this).removeClass('correto').addClass('error');	
						
						$("#msg").html('Largura.: Mínimo de 11cm, Máximo de 105cm');
						}else{
							$(this).removeClass('error').addClass('correto');
							$("#msg").html('');
						}
						}
				});
				//Diametro
				$("#diametroProd").blur(function(){
						if(tamanho(1,4, '#' + $(this).attr('id'))){
						$(this).val('');
						$("#msg").html('Digite o diâmetro do produto!');
						$(this).removeClass('correto').addClass('error');
						}else{
							if(centimetros(5,91,'#' + $(this).attr('id'))){
							$(this).val('');
						$(this).removeClass('correto').addClass('error');	
						
						$("#msg").html('Diâmetro.: Mínimo de 5cm, Máximo de 91cm');
						}else{
							$(this).removeClass('error').addClass('correto');
							$("#msg").html('');
						}
						}
				});

				//Nome do Produto
				$("#nomeProd").blur(function(){
						if(tamanho(1,150, '#' + $(this).attr('id'))){
							$("#msg").html('O nome do produto deve ter no máximo 150 caracteres');
						$(this).removeClass('correto').addClass('error');
						}else{
							$(this).removeClass('error').addClass('correto');
							$("#msg").html('');
						}
				});
              	  //Valor declarado
              	  	$("#valorDeclarado").blur(function(){
              	  		

						if(tamanho(0,5, '#' + $(this).attr('id'))){
							$(this).val('');
						$(this).removeClass('correto').addClass('error');
						
						$("#msg").html('Valor declarado pode ser 0 ou inferior a 10000');
						}else{
							if(centimetros(0,10000,'#' + $(this).attr('id'))){
								$(this).val('');
						$(this).removeClass('correto').addClass('error');	
						
						$("#msg").html('Valor Declarado.: Mínimo de R$0, Máximo de R$ 10000');

						}else{
							$(this).removeClass('error').addClass('correto');
							$("#msg").html('');
						}
						}
						
				});
              	//Telefone
              			

              	  		$("#telefone").blur(function(){
              	  			
						if(tamanho(0,12, '#' + $(this).attr('id'))){
							$(this).val('');
						$(this).removeClass('correto').addClass('error');

						
						$("#msg").html('Telefone contem até 12 digitos. Ex: DDD+Telefone');
						}else{
							
							$(this).removeClass('error').addClass('correto');
							$("#msg").html('');
						}
				});

              	  		//Sedex a Cobrar
              	  		$("#CheckTipoEnvio40045").click(function(){
              	  			var checado = $(this).attr("checked");

              	  			if(checado == 'checked'){
	         	  				var checado = $(this).attr("checked", false);
              	  				$("#valorDeclarado").removeClass('error');
              	  				$("#msg").html('O valor declarado é obrigatório para esta opção');
              	  			}else{
              	  				var checado = $(this).attr("checked", true);
              	  				$("#valorDeclarado").removeClass('correto').addClass('error');
              	  				$("#msg").html('');	
              	  			}
              	  			
              	  		});
					

              	  	//Formato Produto
              	  	$("#formatoProd").blur(function(){
              	  		var formato = $(this).val();
              	  		if(formato == ''){
              	  			$(this).removeClass('correto').addClass('error');
              	  			$("#msg").html('Selecione o formato');
              	  		}else{
              	  			$(this).removeClass('error').addClass('correto');
              	  			$("#msg").html('');
              	  		}
              	  
              	  	
              	  	});
              	  	//Peso Produto
              	  	$("#pesoProd").blur(function(){
              	  		var peso = $(this).val();
              	  		if(peso == ''){
              	  			$(this).removeClass('correto').addClass('error');
              	  			$("#msg").html('Selecione o peso');
              	  		}else{
              	  			$(this).removeClass('error').addClass('correto');
              	  			$("#msg").html('');
              	  		}
		});	
              	  	


	  			$(".container_2").bind("click focus", function(){
	  				
	  				var nomeProd = $("#nomeProd").val();
	  				var pesoProd = $("#pesoProd").val();
	  				var comprProd = $("#comprimentoProd").val();
	  				var larguraProd = $("#larguraProd").val();
	  				var alturaProd = $("#alturaProd").val();
	  				var diametro = $("#diametroProd").val();
	  				var formato = $("#formatoProd").val();
	  				var valores = [nomeProd, pesoProd, comprProd, larguraProd, alturaProd, diametro, formato];
	  				var errados = 0;
	  				jQuery.each(valores, function(index, value){
	  					
	  					if(value == '')
	  					{
	  						//Se algum campo estiver vazio
	  						$('.dadosProd').removeClass(ok).addClass(nao).css('color', 'red');
	  						$('.rowDados').css('color', 'red');
	  						errados = 1;
	  						$('.container_1').fadeIn('fast');
	  						$('#criarCalc').prop('disabled', true);
	  					}
	  					if(errados == 0)
	  					{
	  						
	  						$('.dadosProd').removeClass(nao).addClass(ok).css('color', 'green');
	  						$('.rowDados').css('color', 'green');
	  						$('.container_1').fadeOut('fast');
	  					}
	  				});
	  				
	  				//Formas de Envio
					var checkbox = $("input:checkbox[name^=Envio]:checked");              	  	
              	  	var formaDeEnvio = 0;
              	  	if(checkbox.length == 0){
              	  		formaDeEnvio = '';
                   	  	}else{
              	  		formaDeEnvio = [];
              	  		checkbox.each(function(){
              	  			formaDeEnvio.push($(this).val());
              	  		});
              	  	}

            		var nomeProd = $("#nomeProd").val(); // Obrigatório;
	  				var pesoProd = $("#pesoProd").val();// Obrigatório;
	  				var formato = $("#formatoProd").val(); // Obrigatório;
	  				var comprProd = $("#comprimentoProd").val(); // Obrigatório
	  				var larguraProd = $("#larguraProd").val(); // Obrigatório;
	  				var alturaProd = $("#alturaProd").val(); // Obrigatório;
	  				var diametro = $("#diametroProd").val(); // Obrigatório;
	  				var cepOrigem = $("#cepOrigem").val(); // Obrigatório;
	  				var forma = formaDeEnvio; // Obrigatório
	  				var valorD = $("#valorDeclarado").val() ;
	  				var taxaAdicional = $("#taxaAdicional").val();
	  				var telefone = $("#telefone").val();
	  				var avisoRec = $("input:checkbox[name^=avisoRec]:checked");
	  				

	  				if(nomeProd != '' && pesoProd != '' && formato != '' && comprProd != '' && larguraProd != '' && alturaProd != '' && diametro != '' && cepOrigem != '' && formaDeEnvio){
	  					$('#criarCalc').prop('disabled', false).click(function(){

	  						//$('.container_2').fadeOut('fast');
	  						//alert(window.location.href);
	  						  		/*
									nomeProd : nomeProd,
	  								 formatoProd : formato,
	  								 comprimentoProd : comprProd,
	  								 larguraProd : larguraProd,
	  								 alturaProd : alturaProd,
	  								 diametroProd : diametro,
	  								 cepOrigem : cepOrigem,
	  								 Envio : forma,
	  								 valorDeclarado : valorD,
	  								 taxaAdicional : taxaAdicional,
	  								 telefone : telefone,
	  								 avisoRec : avisoRec	
	  						  		*/		
	  						
	  						
	  					});
	  				}else
	  				{
	  					$('#criarCalc').prop('disabled', true).click(function(){
	  						
	  					});

	  				}		

	  			});



	  			function verificaNumero(e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            }
            	function tamanho(minimo, maximo, i){
            		tam = $(i).val().length;
            		if((tam < minimo) || (tam > maximo))
            		{
            			return true;
            		}else{
            			return false;
            		}
            	}

            	function centimetros(minimo, maximo, i)
            	{
            		cm = $(i).val();
            		if((cm < minimo) || (cm > maximo))
            		{
            			return true;
            		}else{
            			return false;
            		}	
            	}



           
});