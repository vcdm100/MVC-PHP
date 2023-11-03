<?php

namespace App\Http;

class Router {

    /**
     * URL completa do projeto (raiz)
     * @var string
     */
    private $url = '';

    /**
     * Prefixo de todas as rotas
     * @var string
     */
    private $prefix = '';

    /**
     * Ìndice de rotas
     * @var array
     */
    private $routes = [];

    /**
     * Instancia de Request
     * @var Request
     */
    private $request;

    /**
     * Método responsável por iniciar a classe
     *
     * @param string $url
     */
    public function __construct($url) {
        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }

    /**
     * MÉTODO RESPONSÁVEL POR DEFINIR O PREFIXO DAS ROTAS
     */
    private function setPrefix() {
        //INFORMAÇÕES DA URL ATUAL
        $parseUrl = parse_url($this->url);
        /* echo "<pre;>";
        print_r($parseUrl);
        echo "</pre>"; */

        //DEFINE O PREFIXO
        $this->prefix = $parseUrl['path']  ?? '';
    }

    /**
     * MÉTODO RESPONSÁVEL POR ADICIONAR UMA ROTA NA CLASSE
     *
     * @param string $method
     * @param string $route
     * @param array $params
     */
    private function addRoute($method, $route, $params = []) {
        echo "<pre;>";
        print_r($method);
        echo "</pre>";

        echo "<pre;>";
        print_r($route);
        echo "</pre>";

        echo "<pre;>";
        print_r($params);
        echo "</pre>";
    }

    /**
     * MÉTODO RESPONSÁVEL POR DEFINIR UMA ROTA DE GET
     *
     * @param string $route
     * @param array $params
     */
    public function get($route, $params = []){
        return $this->addRoute('GET', $route, $params);
    }










}