<?php

#Conjuntos de identificadores que tem como função agrupar funcionalidades comuns assim também organizando-as: 'namespace' e 'use'
namespace App\Controller\Pages;
use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page {

    /**
     * MÉTODO RESPONSÁVEL POR RETORNAR O "CONTEÚDO (VIEW - PASTA DE RESOURCES)" DA NOSSA HOME
     * @return string
     */

    public static function getHome() {
        //ORGANIZAÇÃO 
        $ob0rganization = new Organization;

        //VIEW DA HOME
        $content = View::render('pages/home', [
            'name'          => $ob0rganization->name,
            'description'   => $ob0rganization->description,
            'site'          => $ob0rganization->site
        ]);
        
        //RETORNA A VIEW DA PÁGINA
        return parent :: getPage('WDEV - Canal - HOME', $content);
    }
}