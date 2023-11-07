<?php

#Conjuntos de identificadores que tem como função agrupar funcionalidades comuns assim também organizando-as: 'namespace' e 'use'
namespace App\Controller\Pages;
use \App\Utils\View;
use \App\Model\Entity\Organization;

class About extends Page {

    /**
     * MÉTODO RESPONSÁVEL POR RETORNAR O "CONTEÚDO (VIEW - PASTA DE RESOURCES)" DA NOSSA PÁGINA DE SOBRE WDEV
     * @return string
     */
    public static function getAbout() {
        //ORGANIZAÇÃO 
        $ob0rganization = new Organization;

        # ==================================================

        //VIEW DA HOME
        $content = View::render('pages/about', [
            'name'          => $ob0rganization->name,
            'description'   => $ob0rganization->description,
            'site'          => $ob0rganization->site
        ]);

        # ==================================================
        
        //RETORNA A VIEW DA PÁGINA
        return parent :: getPage('SOBRE > WDEV', $content);
    }
    
}