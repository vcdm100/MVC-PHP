<?php

#Conjuntos de identificadores que tem como função agrupar funcionalidades comuns assim também organizando-as: 'namespace' e 'use'
namespace App\Controller\Pages;
use \App\Utils\View;
use \App\Model\Entity\Testimony as EntityTestimony;

class Testimony extends Page {

    /**
     * MÉTODO RESPONSÁVEL POR RETORNAR O "CONTEÚDO (VIEW - PASTA DE RESOURCES)" DE DEPOIMENTOS
     * @return string
     */
    public static function getTestimonies() {

        //VIEW DE DEPOIMENTOS
        $content = View::render('pages/testimonies', [

        ]);

        # ==================================================
        
        //RETORNA A VIEW DA PÁGINA
        return parent :: getPage('DEPOIMENTOS > WDEV', $content);
    }

    // ======================================================================

    /**
     * MÉTODO RESPONSÁVEL POR CADASTRAR UM DEPOIMENTO
     *
     * @param Request $request
     * @return string
     */
    public static function insertTestimony($request) {

        //DADOS DO POST
        $postVars = $request->getPostVars();
        /* echo "<pre>";
        print_r($postVars);
        echo "</pre>"; 
        exit; */

        //NOVA INSTANCIA DE DEPOIMENTO
        $obTestimony = new EntityTestimony;
        $obTestimony->nome = $postVars['nome'];
        $obTestimony->mensagem = $postVars['mensagem'];
        $obTestimony->cadastrar();

        return self :: getTestimonies();
    }
    
}