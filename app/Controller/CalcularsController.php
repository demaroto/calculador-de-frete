<?php 

class CalcularsController extends AppController {
	public $components = array ('Correios');
	public function index()
		{
		
			//Deletar após 180 dias criação
			$tempo = date('Y-m-d', strtotime('-180 days'));
			$delete = $this->Calcular->deleteAll(array('Calcular.criado' => $tempo));
		
			
			
		}

	

	public function add()
	{
		$this->set('titulo', 'Novo Calculador');

		if ($this->request->is('post')) {
						
			$nomeProd = $this->request->data['nomeProd'];
			$formatoProd = $this->request->data['formatoProd'];
			$comprimentoProd = $this->request->data['comprimentoProd'];
			$larguraProd = $this->request->data['larguraProd'];
			$alturaProd = $this->request->data['alturaProd'];
			$diametroProd = $this->request->data['diametroProd'];
			$cepOrigem = $this->request->data['cepOrigem'];
			$avisoRec = $this->request->data['avisoRec'];
			$dataInsercao = date('Y-m-d');
			if($this->request->data['Envio'] != null)
			{
			$Envio = '';
			$separator = array(0 => '', 1 => ',', 2 => ',', 3 => ',');
				for($x =0; $x < count($this->request->data['Envio']); $x++)
				{
				$Envio .= $separator[$x].$this->request->data['Envio'][$x];
				}
				$cadasEnvio = $Envio;
			
				}else{
					$cadasEnvio = false;
				}
				if(@$avisoRec[0] != 'S')
				{
					$avisoRec = 'N';
				}else{
					$avisoRec = 'S';
				}

			$valorDeclarado = $this->request->data['valorDeclarado'];
			$taxaAdicional = $this->request->data['taxaAdicional'];
			$telefone = $this->request->data['telefone'];
			$pesoProd = $this->request->data['pesoProd'];
			$linkHash = uniqid(uniqid());
			$salvar = array('nomeProd' => $nomeProd, 'formatoProd' => $formatoProd, 'comprimentoProd' => $comprimentoProd, 'larguraProd' => $larguraProd, 'alturaProd' => $alturaProd, 'diametroProd' => $diametroProd, 'cepOrigem' => $cepOrigem, 'Envio' => $cadasEnvio, 'valorDeclarado' => $valorDeclarado, 'taxaAdicional' => $taxaAdicional, 'telefone' => $telefone, 'avisoRec' => $avisoRec, 'pesoProd' => $pesoProd, 'linkHash' => $linkHash, 'criado' => $dataInsercao);
			
			//print_r($salvar);
			if($this->Calcular->save($salvar)){
				$this->Session->setFlash('Salvo com sucesso!');
				$this->redirect(array('controller' => 'calculars', 'action' => 'criado', $linkHash));
				
			}else
			{
				$this->Session->setFlash('Não foi salvo!');
			}
		}
	}
	public function view($linkHash = null)
	{
		App::import('Utility', 'Xml');
					$valor = $this->request->pass;
		$retorno = isset($valor[0]) ? $valor[0] : '';

		  if($retorno != '')
		  {
		  			  $resultado = $this->Calcular->find('first', array(
        'conditions' => array('Calcular.linkHash' => $retorno)
    ));
		  			  $qtdRes = count($resultado);
		  			  if($qtdRes > 0){
						$this->set('calcular', $resultado);	
					}else{
						$this->redirect(array('controller' => 'calculars', 'action' => 'error'));
					}
		}else{
			$this->redirect(array('controller' => 'calculars', 'action' => 'error'));
		}

		if($this->request->is('post'))
		{

			$envForm = '';
			$f = explode(',', $resultado['Calcular']['Envio']);
			$qtd = count($f);
			$separator = array(0 => '', 1 => ',', 2 => ',', 3 => ',');
			for($x = 0; $x < $qtd; $x++){
 			$envForm .=  $separator[$x].$f[$x];
 			}
			 $cadasEnvio = $envForm;
			 $cepOrigem = $resultado['Calcular']['cepOrigem'];
 			$cepDestino = $this->request->data['cepDestino'];
 			$peso = $resultado['Calcular']['pesoProd'];
 			$formato = $resultado['Calcular']['formatoProd'];
 			$compri = $resultado['Calcular']['comprimentoProd'];
 			$altura = $resultado['Calcular']['alturaProd'];
 			$largura = $resultado['Calcular']['larguraProd'];
 			$diametro = $resultado['Calcular']['diametroProd'];
 			$valorD = $resultado['Calcular']['valorDeclarado'];
 			$avisoRec = $resultado['Calcular']['avisoRec'];
 			$t = "";
			

			if($this->Correios->calcFrete($t,$t,$cadasEnvio,$cepOrigem,$cepDestino,$peso,$formato,$compri,$altura,$largura,$diametro,'N',$valorD,$avisoRec,'xml','3'))
			{
				$this->set('xml', $this->Correios->calcFrete($t,$t,$cadasEnvio,$cepOrigem,$cepDestino,$peso,$formato,$compri,$altura,$largura,$diametro,'N',$valorD,$avisoRec,'xml','3'));
					
		}else{
			$this->Session->setFlash('Erro ao calcular o frete, tente novamente!');
		}

			
		}else{

		}
	}
	public function error(){


	}

	public function criado()
	{
				$valor = $this->request->pass;
		$retorno = isset($valor[0]) ? $valor[0] : '';

		  if($retorno != '')
		  {
		  			  $resultado = $this->Calcular->find('first', array(
        'conditions' => array('Calcular.linkHash' => $retorno)
    ));
		  			  $qtdRes = count($resultado);
		  			  if($qtdRes > 0){
						$this->set('calcular', $resultado);	
					}else{
						$this->redirect(array('controller' => 'calculars', 'action' => 'error'));
					}
		}else{
			$this->redirect(array('controller' => 'calculars', 'action' => 'error'));
		}
	}
	}

 ?>