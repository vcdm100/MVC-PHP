<?php

namespace App\Http;

class Request {

        /**
         * MÉTODO HTTP DA REQUISIÇÃO
         * @var string
         */
        private $httpMethod;

        /**
         * URI DA PÁGINA
         * @var string
         */
        private $uri;

        /**
         * Parâmetros da URL ($_GET)
         * @var array
         */
        private $queryParams = [];

        /**
         * VARIÁVEIS RECEBIDAS NO POST DA PÁGINA ($_POST)
         */
        private $postVars = [];

        /**
         * CABEÇALHO DA REQUISIÇÃO
         * @var array
         */
        private $headers = [];

    // =======================================================================

        /**
         * Construtor da classe
         */
        public function __construct() { #Este é o método construtor da classe. Ele é chamado automaticamente quando um objeto da classe é criado.
            $this->queryParams = $_GET ?? []; 
            // Isso está inicializando uma propriedade chamada $queryParamsdo objeto criado. O $thisse refere à instância atual da classe. $_GETé uma variável superglobal em PHP que contém os parâmetros passados ​​na URL (por exemplo, ?nome=valor). Se $_GETestiver vazio ou não definido, $queryParamsserá inicializado com um array vazio [].
            $this->postVars = $_POST ?? []; 
            // Semelhante ao item anterior, mas em vez de pegar os parâmetros da URL, está pegando os dados enviados através de um formulário HTTP usando o método POST. $_POSTé outra variável superglobal.
            $this->headers = getallheaders();
            // Esta linha está chamando a função getallheaders()para obter todos os cabeçalhos HTTP enviados com a requisição. Os cabeçalhos contêm informações sobre a requisição, como o tipo de conteúdo, o acordo e outras informações relevantes.
            $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
            // Está sendo atribuído o método HTTP usado na requisição (por exemplo, GET, POST, etc.) à propriedade $httpMethod. $_SERVERé outra variável superglobal que contém informações sobre o servidor e a requisição atual. Caso o método não esteja definido na requisição, será atribuída uma string vazia ''.
            $this->uri = $_SERVER['REQUEST_URI'] ?? '';
            // Semelhante ao item anterior, está sendo atribuído a URI (Uniform Resource Identifier) ​​da requisição à propriedade $uri. A URI geralmente contém o caminho do recurso solicitado. Se um URI não estiver definido na requisição, será atribuída uma string vazia ''.
        }
    
    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR RETORNAR O MÉTODO HTTP DA REQUISIÇÃO
         * @return string
         */
        public function getHttpMethod() {
            return $this->httpMethod;
        }

    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR RETORNAR A URI DA REQUISIÇÃO
         * @return string
         */
        public function getUri() {
            return $this->uri;
        }

    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR RTORNAR OS HEADERS DA REQUSIÇÃO
         * @return array
         */
        public function getHeaders() {
            return $this->headers;
        }

    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR RETORNAR O MÉTODO HTTP DA REQUISIÇÃO
         * @return string
         */
        public function getQueryParams() {
            return $this->queryParams;
        }

    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR RETORNAR AS VARIAVEIS POST DA REQUISIÇÃO
         * @return string
         */
        public function getPostVars() {
            return $this->postVars;
        }
    
}