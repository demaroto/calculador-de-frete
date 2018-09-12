<?php 
class Correios{
	public 
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
	$indicaCalc;

	public function calcFrete(){
		$cURL = curl_init(sprintf('http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=%s&sDsSenha=%s&nCdServico=%s&sCepOrigem=%s&sCepDestino=%s&nVlPeso=%s&nCdFormato=%s&nVlComprimento=%s&nVlAltura=%s&nVlLargura=%s&nVlDiametro=%s&sCdMaoPropria=%s&nVlValorDeclarado=%s&sCdAvisoRecebimento=%s&StrRetorno=%s&nIndicaCalculo=%s', 
	$this->codEmpresa,
	$this->senhaCorp,
	$this->numServico,
	$this->cepOrigem,
	$this->cepDestino,
	$this->peso,
	$this->formato,
	$this->comprimento,
	$this->altura,
	$this->largura,
	$this->diametro,
	$this->maoPropria,
	$this->valorDeclarado,
	$this->avisoRecebimento,
	$this->tipoRetorno,
	$this->indicaCalc
	));
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		$string =  curl_exec($cURL);
		curl_close($cURL);
		
		$xml = simplexml_load_string($string);
		if($xml)
		{
		return $xml;
		}

	}
}

 ?>