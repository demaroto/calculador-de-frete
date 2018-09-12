<?php 
class CorreiosComponent extends Component{
	function calcFrete($codEmpresa,$senhaCorp,$numServico,$cepOrigem,$cepDestino,$peso,$formato,$comprimento,$altura,$largura,$diametro,$maoPropria,$valorDeclarado,$avisoRecebimento,$tipoRetorno,$indicaCalc){
		$cURL = curl_init(sprintf('http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=%s&sDsSenha=%s&nCdServico=%s&sCepOrigem=%s&sCepDestino=%s&nVlPeso=%s&nCdFormato=%s&nVlComprimento=%s&nVlAltura=%s&nVlLargura=%s&nVlDiametro=%s&sCdMaoPropria=%s&nVlValorDeclarado=%s&sCdAvisoRecebimento=%s&StrRetorno=%s&nIndicaCalculo=%s', 
	$codEmpresa,
	$senhaCorp,
	$numServico,
	$cepOrigem,
	$cepDestino,
	$peso,
	$formato,
	$comprimento,
	$altura,
	$largura,
	$diametro,
	$maoPropria,
	$valorDeclarado,
	$avisoRecebimento,
	$tipoRetorno,
	$indicaCalc
	));
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		$string =  curl_exec($cURL);
		curl_close($cURL);
		
		$xml = Xml::toArray(Xml::build($string));
		if($xml)
		{
		return $xml;
		
		}else{
			return 'Error no XML';
		}

	}
	
	

}


 ?>