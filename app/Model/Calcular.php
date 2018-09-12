<?php
App::uses('AppModel', 'Model');


class Calcular extends AppModel {
	public $validate = array(
		'nomeProd' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Nome do produto não pode ficar vazio!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'pesoProd' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

}
?>