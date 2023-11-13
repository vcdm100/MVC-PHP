<?php

use App\Http\Response;
use App\Controller\Pages;

//ROTA HOME - http://127.0.0.1:8080/ ou http://localhost:8080/
$obRouter->get('/', [
    function() {
        return new Response(200, Pages\Home :: getHome());
    }
]);
/* echo "<pre>";
print_r($obRouter);
echo "</pre>";
exit; */

// ============================================================


//ROTA SOBRE - http://127.0.0.1:8080/sobre ou http://localhost:8080/sobre
$obRouter->get('/sobre', [
    function() {
        return new Response(200, Pages\About :: getAbout());
    }
]);
/* echo "<pre>";
print_r($obRouter);
echo "</pre>";
exit; */

// ============================================================

/* //ROTA DINÂMICA - http://127.0.0.1:8080/pagina/10
$obRouter->get('/pagina/10', [
    function() {
        return new Response(200, 'Página 10');
    }
]);
/* echo "<pre>";
print_r($obRouter);
echo "</pre>";
exit; */

//ROTA DINÂMICA - http://127.0.0.1:8080/pagina/10/consultar ou http://localhost:8080/pagina/10/consultar
$obRouter->get('/pagina/{idPagina}/{acao}', [
    function($idPagina, $acao) {
        return new Response(200, 'Página ' . $idPagina . ' - ' . $acao);
    }
]);
/* echo "<pre>";
print_r($obRouter);
echo "</pre>";
exit; */

// ============================================================

//ROTA DEPOIMENTOS - http://127.0.0.1:8080/deposimentos ou http://localhost:8080/depoimentos
$obRouter->get('/depoimentos', [
    function() {
        return new Response(200, Pages\Testimony :: getTestimonies());
    }
]);
/* echo "<pre>";
print_r($obRouter);
echo "</pre>";
exit; */

// ============================================================

//ROTA DEPOIMENTOS (INSERT) - http://127.0.0.1:8080/deposimentos ou http://localhost:8080/depoimentos
$obRouter->post('/depoimentos', [
    function($request) {
    /* echo "<pre>";
    print_r($request);
    echo "</pre>";
    exit; */
        return new Response(200, Pages\Testimony :: insertTestimony($request));
    }
]);
/* echo "<pre>";
print_r($obRouter);
echo "</pre>";
exit; */