<h1>Calculo de Frete</h1>
<?php 
$formaEnv = array('41106' => 'PAC', '40010' => 'SEDEX', '40045' => 'SEDEX a Cobrar', '40215' => 'SEDEX 10');
$c = $calcular['Calcular'];
$cep = str_split($c['cepOrigem'], 5);
$f = explode(',', $c['Envio']);

 ?>



<div class='col-md-12'>
<h3 class='titulo'>
<?php echo $c['nomeProd']; ?>
</h3>

<?php 
echo $this->Form->create('calcular');
echo $this->Form->input('text', array('placeholder' => 'CEP Destino', 'label' => 'CEP de Destino', 'class' => 'form-control', 'name' => 'cepDestino'));
echo $this->Form->input('linkH', array('value' => $c['linkHash'], 'type' => 'hidden'));

echo $this->Form->End('Calcular');
?>

</div>
<div class='col-md-12'>
	<div id="retorno">
	<table class="table .table-responsive">
	

	<?php
	if(isset($xml))
	{

	echo '<th>Serviço</th>';
	echo '<th>Valor</th>';
	echo '<th>Prazo de Entrega (dias)</th>';
	echo '<th>Observação</th>';
	$qtd = count($xml['Servicos']['cServico']);
	for($x = 0;$x < $qtd; $x++){
	echo '<tr>
	<td>'.$formaEnv[$xml['Servicos']['cServico'][$x]['Codigo']].'</td>
	<td>'.$xml['Servicos']['cServico'][$x]['Valor'].'</td>
	<td>'.$xml['Servicos']['cServico'][$x]['PrazoEntrega'].'</td>
	<td>'.$xml['Servicos']['cServico'][$x]['MsgErro'].'</td>
	</tr>';
	}
	}
	?>
	


</table>
	</div>	
</div>






