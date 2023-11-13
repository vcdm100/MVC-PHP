<?php

require __DIR__ . '/includes/app.php';

use \App\Http\Router;

// ==========================================================

	/* $obResponse = new \App\Http\Response(404, 'Olá mundo');
	echo "<pre>";
	print_r($obResponse);
	echo "</pre>";

	$obResponse->sendResponse();

	exit; */

// ==========================================================

	/* echo Home :: getHome(); */

// ==========================================================

	//INICIA O ROUTER
	$obRouter = new Router(URL);
	/* echo "<pre>";
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