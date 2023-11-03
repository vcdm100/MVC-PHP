<?php

namespace App\Http;

class Response {

    /**
     * Código do Status HTTP
     * @var integer
     */
    private $httpCode = 200;

    /**
     * Cabeçalho do Response
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteúdo que está sendo retornado
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Conteúdo do Response
     * @var mixed
     */
    private $content;

    /**
     * MÉTODO RESPONSÁVEL POR INCICIAR A CLASSE E DEFINIR OS VALORES
     * @param integer $htppCode
     * @param mixed $content
     * @param string $contentType
     */
    public function __construct($httpCode, $content, $contentType = 'text/html') {
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->setContentType($contentType);
    }

    /**
     * MÉTODO RESPONSÁVEL POR ALTERAR O CONTENT TYPE DO RESPONSE
     * @param string $contentType
     */
    public function setContentType($contentType) {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * MÉTODO RESPONSÁVEL POR ADICIONAR UM REGISTRO NO CABEÇALHO DE RESPONSE
     * @param string $key
     * @param string $value
     */
    public function addHeader($key,$value) {
        $this->headers[$key] = $value;
    }

    /**
     * MÉTODO RESPONSÁVEL POR ENVIAR OS HEADERS PARA O NAVEGADOR
     */
    private function sendHeaders() {
        //STATUS
        http_response_code($this->httpCode);

        //ENVIAR HEADERS
        foreach($this->headers as $key=>$value) {
            header($key. ': '.$value);
        }
    }

    /**
     * MÉTODO RESPONSÁVEL POR ENVIAR A RESPOSTA PARA O USUÁRIO
     */
    public function sendResponse() {
        //ENVIA OS HEADERS
        $this->sendHeaders();

        //IMPRIME O CONTEUDO
        switch ($this->contentType) {
            case 'text/html' :
                echo $this->content;
                exit;
        }
    }

}