<?php

#Conjuntos de identificadores que tem como função agrupar funcionalidades comuns assim também organizando-as: 'namespace' e 'use'.
namespace App\Controller\Pages;
use \App\Utils\View;

class Page {

        /**
         * MÉTODO RESPONSÁVEL POR RENDERIZAR O TOPO DA NOSSA PÁGINA "HEADER"
         * @return string
         */
        private static function getHeader() {
            return View :: render('pages/header');
        }
    
    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR RENDERIZAR O TOPO DA NOSSA PÁGINA "FOOTER"
         * @return string
         */
        private static function getFooter() {
            return View :: render('pages/footer');
        }

    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR RETORNAR O "CONTEÚDO (VIEW - PASTA DE RESOURCES)" DA NOSSA PÁGINA GENÉRICA
         * @return string
         */
        public static function getPage($title, $content) {
            return View :: render('pages/page', [
                'title' => $title,
                'header' => self :: getHeader(),
                'content' => $content,
                'footer' => self :: getFooter(),
            ]);
        }

}