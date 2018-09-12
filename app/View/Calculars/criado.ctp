<h3>Calculadora Criada com Sucesso!</h3>
<?php 
$c = $calcular['Calcular'];
$cep = str_split($c['cepOrigem'], 5);
$formaEnv = array('41106' => 'PAC', '40010' => 'SEDEX', '40045' => 'SEDEX a Cobrar', '40215' => 'SEDEX 10');
$f = explode(',', $c['Envio']);
$this->set('title_for_layout', 'Calculadora de '.$c['nomeProd']);
 ?>

<table class="table .table-responsive">
	<tr>
	<td>Produto</td>
	<td><?php echo $c['nomeProd']; ?></td>
	</tr>

	<tr>
	<td>Peso até </td>
	<td><?php echo $c['pesoProd'].' kg'; ?></td>
	</tr>

	<tr>
	<td>Dimensões</td>
	<td><?php echo $c['comprimentoProd'].' cm X'.$c['larguraProd'].' cm X'.$c['alturaProd']. ' cm (Comprimento X Largura X Altura)'; ?></td>
	</tr>

	<tr>
	<td>Cep de Origem </td>
	<td><?php echo $cep[0].'-'.$cep[1]; ?></td>
	</tr>

	<tr>
	<td>Formas de Envio </td>
	<td><?php 
		echo '| ';
		foreach($f as $ch => $val)
		{
		echo $formaEnv[$val].' | ';
		}
	 ?></td>
</tr>
	 <tr>
	<td>Valor Declarado </td>
	<td><?php
	if($c['valorDeclarado'] == '' || $c['valorDeclarado'] == 0)
	{
	$valorDecl = '0,00';
	echo $valorDecl; 
	}else{
	echo 'R$ '.$c['valorDeclarado'].',00';
	}
	?>
	</td>
	</tr>
	
		<td>Texa Adicional </td>
	<td><?php
	if($c['taxaAdicional'] == '' || $c['taxaAdicional'] == 0)
	{
	$taxaD = '0,00';
	echo $taxaD; 
	}else{
	echo 'R$ '.$c['taxaAdicional'].',00';
	}
	?>
	</td>
	</tr>

	<tr>
	<td>Adicionais </td>
	<td><?php 
	$av = $c['avisoRec'];
	if($av == 'N')
	{
	$aviso = 'Não';
	}else{
	$aviso = 'SIM';
	}
	echo 'Aviso de Recebimento (AR): '. $aviso; 


	?></td>
	</tr>
<tr>
	<td><?php 
	$tel = $c['telefone'];
	if($tel != 0 || $tel != '')
	{
	echo 'Telefone de Contato';
	}
	?></td>
	<td><?php 
	$tel = $c['telefone'];
	if($tel != 0 || $tel != '')
	{
	echo '+55 '.$tel;
	}

	?></td>
	</tr>


	<tr>
	<td>Link do Calculador</td>
	
	<td>
	<?php 
	//print_r(array('controller' => 'calculars', 'action' => 'view', 'full_base' => true, $c['linkHash']));
	echo $this->Html->link('Link', array('controller' => 'calculars', 'action' => 'view', 'full_base' => true, $c['linkHash']), array('target' => '_blank'));
	?>
	</td>
	</tr>
</table>

<?php
echo '<hr />';
echo "<b class=''>Tags para inserções em outros sites</b>";
echo '<hr />';
$servidor = $_SERVER[ 'HTTP_HOST'];
$pg = $this->request->here;
$url = $servidor.$pg;
echo 'Imagem de 400px de largura<br />';
$bigImage = $this->Html->image('btn-frete-400.png', array('url' => array('controller' => 'calculars', 'action' => 'view', $c['linkHash']), 'target' => '_blank', 'border' => 0, 'class' => 'bigImage'));
echo $bigImage;
echo $this->Form->input('textarea', array('type' => 'textarea', 'cols' => '100', 'width' => '100', 'label' => 'Link do Calculador', 'class' => 'form-control', 'value' => $bigImage));
echo '<hr />';
echo 'Imagem de 150px de largura<br />';
$smallImage = $this->Html->image('btn-frete-150.png', array('url' => array('controller' => 'calculars', 'action' => 'view', $c['linkHash']), 'target' => '_blank', 'border' => 0, 'class' => 'smallImage'));
echo $smallImage;
echo $this->Form->input('textarea', array('type' => 'textarea', 'cols' => '100', 'width' => '100', 'label' => 'Link do Calculador', 'class' => 'form-control', 'value' => $smallImage));


$nomeCampos = array(
'id' => 'id',
'nomeProd' => 'Produto',
'formatoProd' => 'Formato',
'comprimentoProd' => 'Comprimento',
'larguraProd' => 'Largura',
'alturaProd' => 'Altura',
'diametroProd' => 'Diâmetro',
'cepOrigem' => 'CEP',
'Envio' => 'Formas de Envio',
'valorDeclarado' => 'Valor Declarado',
'taxaAdicional' => 'Taxa Adicional',
'telefone' => 'Telefone de Contato',
'avisoRec' => 'Adicionais',
'pesoProd' => 'Peso até',
'linkHash' => 'Link do Calculador',
'created' => 'Criado em'
 );


?>