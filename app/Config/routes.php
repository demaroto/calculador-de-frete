<?php

 

	Router::connect('/', array('controller' => 'calculars', 'action' => 'index'));

	CakePlugin::routes();


	require CAKE . 'Config' . DS . 'routes.php';
