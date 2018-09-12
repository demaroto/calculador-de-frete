<?php 
	 $this->set('title_for_layout', 'Novo Calculador');
	echo '<h1>'.$titulo.'</h1>';

	echo '<hr />';

	
	 ?>
	 
	 <h3 class="rowDados">Dados do Produto<span class='dadosProd'></span></h3>
	 <div class="container_1">
	 	  <div class="col-md-6">
	 <?php 
	 echo $this->form->create('Calcular');
	echo $this->form->input('text', array('placeholder' => 'Nome do Produto', 'label' => '* Nome do Produto', 'class' => 'form-control', 'id' => 'nomeProd', 'name' => 'nomeProd'));
	echo '<br />';
$opcoes = array(
		'' => 'Peso',
		'0,300' => '0,300 gramas',
		'1' => '1 kg',
		'2' => '2 kg',
		'3' => '3 kg',
		'4' => '4 kg',
		'5' => '5 kg',
		'6' => '6 kg',
		'7' => '7 kg',
		'8' => '8 kg',
		'9' => '9 kg',
		'10' => '10 kg',
		'11' => '11 kg',
		'12' => '12 kg',
		'13' => '13 kg',
		'14' => '14 kg',
		'15' => '15 kg',
		'16' => '16 kg',
		'17' => '17 kg',
		'18' => '18 kg',
		'19' => '19 kg',
		'20' => '20 kg',
		'21' => '21 kg',
		'22' => '22 kg',
		'23' => '23 kg',
		'24' => '24 kg',
		'25' => '25 kg',
		'26' => '26 kg',
		'27' => '27 kg',
		'28' => '28 kg',
		'29' => '29 kg',
		'30' => '30 kg',
	);

echo $this->Form->input('pesoProd', array('options' => $opcoes, 'class' => 'form-control', 'label' => '* Peso aproximado em Kilogramas', 'id' => 'pesoProd'));


	  ?>
	  </div>
	  <div class="col-md-6">
	  		<?php
	  			 	
	  		$opcoes = array('' => 'Formato', '1' => 'Caixa/Pacote', '2' => 'Rolo/Prisma', '3' => 'Envelope');
	 		echo $this->Form->input('field', array('options' => $opcoes, 'class' => 'form-control', 'label' => '* Formato da encomenda', 'id' => 'formatoProd', 'name' => 'formatoProd'));

	  			?>
	  		</div>
	  <div class="col-md-3">
	  	<?php 	echo $this->Form->input('text', array('placeholder' => 'Comprimento', 'label' => '* Comprimento em cm','class' => 'form-control', 'id' => 'comprimentoProd', 'name' => 'comprimentoProd')); ?>
	  </div>
	  <div class="col-md-3">
	  	<?php 	echo $this->Form->input('text', array('placeholder' => 'Largura', 'label' => '* Largura em cm','class' => 'form-control', 'id' => 'larguraProd', 'name' => 'larguraProd')); ?>

	  </div>
	  <div class="col-md-3">
	  	<?php 	echo $this->Form->input('text', array('placeholder' => 'Altura', 'label' => '* Altura em cm','class' => 'form-control', 'id' => 'alturaProd', 'name' => 'alturaProd')); ?>
	  </div>
	    <div class="col-md-3">
	  	<?php 	echo $this->Form->input('text', array('placeholder' => 'Diametro', 'label' => '* Diametro em cm','class' => 'form-control', 'id' => 'diametroProd', 'name' => 'diametroProd')); ?>
	  </div>
	  </div>

	  
	  
	  <h3 class="rowEnvio">Dados de Envio <span class='enviProd'></span></h3>
	  <div class="container_2">
	  		<div class="col-md-3">
	  			<?php 	echo $this->Form->input('text', array('placeholder' => 'CEP de Origem', 'label' => '* CEP de Origem','class' => 'form-control', 'id' => 'cepOrigem', 'name' => 'cepOrigem')); ?>
	  		</div>
	  		<div class="col-md-3">
	  			<?php
	  			echo '<br />'; 	
	  			echo $this->Form->input('check_tipoEnvio', array(
	  				'options' => array('41106' => 'PAC', '40010' => 'SEDEX', '40045' => 'SEDEX a Cobrar', '40215' => 'SEDEX 10'),
	  				'multiple' => 'checkbox',
	  				'name' => 'Envio',
	  				'label' => '* Formas de Envio',
	  				
	  			));
	  			
	  			?>
	  		</div>
	  		<div class="col-md-3">
	  			<?php 	echo $this->Form->input('text', array('placeholder' => 'Valor declarado', 'label' => 'Valor declarado','class' => 'form-control', 'id' => 'valorDeclarado', 'name' => 'valorDeclarado')); ?>
	  		</div>
	  			<div class="col-md-3">
	  			<?php 	echo $this->Form->input('text', array('placeholder' => 'Taxa adicional', 'label' => 'Taxa extra a acrescentar','class' => 'form-control', 'id' => 'taxaAdicional', 'name' => 'taxaAdicional')); ?>
	  		</div>
	  		<br />
	  		<div class="col-md-3">
	  			<?php echo $this->Form->input('text', array('placeholder' => 'DDD+Telefone','label' => 'Telefone (Opcional)', 'class' => 'form-control', 'id' => 'telefone', 'name' => 'telefone', )); ?>

	  		</div>
	  		<div class="col-md-3">
	  		<?php
	  			 	

	  			echo $this->Form->input('avisoRecebimento', array(
	  				'options' => array('S' => 'Aviso de Recebimento (AR)'),
	  				'multiple' => 'checkbox',
	  				'label' => 'Adicionais',
	  				'name' => 'avisoRec',
	  				'checked' => 'checked'
	  			));

	  			?>
	  		</div>

	  		
	  </div>
	  <div class="col-md-3">
	  		<?php
	  			 	

	  				$opt = array(
	  				'label' => 'Criar Calculadora',
	  				'value' => 'Criar Calculadora',
	  				'class' => 'btn btn-success',
	  				'id' => 'criarCalc',
	  				'type' => 'submit'
	  			);
	  			echo $this->Form->End($opt);
	  			
	  			?>
	  		</div>
<div id="tele"></div>