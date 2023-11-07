<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Http\Router;
use \App\Utils\View;

// ==========================================================

	/* $obResponse = new \App\Http\Response(404, 'Olá mundo');
	echo "<pre;>";
	print_r($obResponse);
	echo "</pre>";

	$obResponse->sendResponse();

	exit;*/

// ==========================================================

	/* echo Home :: getHome(); */

// ==========================================================

	define('URL', 'http://localhost/mvc'); # --> Funcionou 
	//define('URL', 'http://127.0.0.1:8080/'); # --> URL não encontrada

// ==========================================================

	//DEFINE O VALOR PADRÃO DAS VARIÁVEIS
	View :: init([
		'URL' => URL
	]);

// ==========================================================

	//INICIA O ROUTER
	$obRouter = new Router(URL);
	/* echo "<pre;>";
	print_r($obRouter);
	echo "</pre>";
	exit; */

// ==========================================================

	//INCLUI AS ROTAS DE PÁGINAS
	include __DIR__.'/routes/pages.php';

// ==========================================================

	//IMPRIME O RESPONSE DA ROTA
	$obRouter->run()
			->sendResponse();