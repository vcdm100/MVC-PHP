<?php

require __DIR__ .'/../vendor/autoload.php';

use \App\Utils\View;
use \WilliamCosta\DotEnv\Environment;
use \WilliamCosta\DatabaseManager\Database;

	//CARREGA VARIÁVEIS DE AMBIENTE
	Environment :: load(__DIR__.'/../');
    /* echo "<pre>";
	print_r(getenv('URL'));
	echo "</pre>";
	exit; */

// ==========================================================

    //DEFINE AS CONFIGURAÇÕES DE BANCO DE DADOS 
    Database :: config(
        getenv('DB_HOST'),
        getenv('DB_NAME'),
        getenv('DB_USER'),
        getenv('DB_PASS'),
        getenv('DB_PORT'),
    );

// ==========================================================

	//DEFINE A CONSTANTE DE URL
	define('URL', getenv('URL'));

// ==========================================================

	//DEFINE O VALOR PADRÃO DAS VARIÁVEIS
	View :: init([
		'URL' => URL
	]);

// ==========================================================

	//define('URL', 'http://localhost/mvc'); # --> Funcionou 
	//define('URL', 'http://127.0.0.1:8080/'); # --> URL não encontrada