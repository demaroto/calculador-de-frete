<h1>Cálculo de Frete</h1>
<?php 
$formaEnv = array('41106' => 'PAC', '40010' => 'SEDEX', '40045' => 'SEDEX a Cobrar', '40215' => 'SEDEX 10');
$c = $calcular['Calcular'];
$cep = str_split($c['cepOrigem'], 5);
$f = explode(',', $c['Envio']);
$this->set('title_for_layout', 'Cálculo de Frete: '.$c['nomeProd']);
 ?>



<div class='col-md-12'>
<h3 class='titulo'>
<?php echo $c['nomeProd']; ?>
</h3>

<?php 
echo $this->Form->create('calcular');
echo $this->Form->input('text', array('placeholder' => 'Digite o CEP Destino', 'label' => 'CEP de Destino (Apenas Digitos)', 'class' => 'form-control', 'name' => 'cepDestino', 'id' => 'cepDestino'));
echo $this->Form->input('linkH', array('value' => $c['linkHash'], 'type' => 'hidden'));
echo $this->Form->End(array('label' => 'Calcular Frete', 'class' => 'form-control'));
?>

</div>
<div class='col-md-12'>
	<div id="retorno">
	
	

	<?php
	if(isset($xml))
	{
	echo "<table class='table .table-responsive'>";
	echo '<th>Serviço</th>';
	echo '<th>Valor</th>';
	echo '<th>Prazo de Entrega (dias)</th>';
	echo '<th>Observação</th>';
	$qtd = count($xml['Servicos']['cServico']);
	$key = $xml['Servicos'];
	if ($qtd > 4) {
   
	echo '<tr>
	<td>'.$formaEnv[$xml['Servicos']['cServico']['Codigo']].'</td>
	<td>R$ '.$xml['Servicos']['cServico']['Valor'].'</td>
	<td>'.$xml['Servicos']['cServico']['PrazoEntrega'].'</td>
	<td>'.$xml['Servicos']['cServico']['MsgErro'].'</td>
	</tr>';
	
	
}else{
	for($x = 0;$x < $qtd; $x++){
	echo '<tr>
	<td>'.$formaEnv[$xml['Servicos']['cServico'][$x]['Codigo']].'</td>
	<td>R$ '.$xml['Servicos']['cServico'][$x]['Valor'].'</td>
	<td>'.$xml['Servicos']['cServico'][$x]['PrazoEntrega'].'</td>
	<td>'.$xml['Servicos']['cServico'][$x]['MsgErro'].'</td>
	</tr>';
	
	}
}

	?>
	
<?php

	echo '</table>';
	echo '<br />';
	$phone = $c['telefone'];
	if($phone != 0){
	echo 'Telefone de Contato: +55 '.$c['telefone'];
	}
	
	}	

	
?>
	</div>	
</div>






