<?php

namespace App\Http;
use \Closure;
use Exception;
use \ReflectionFunction;

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

    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR INCIAR A CLASSE
         *
         * @param string $url
         */
        public function __construct($url) {
            $this->request = new Request();
            $this->url = $url;
            $this->setPrefix();
        }

    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR DEFINIR O PREFIXO DAS ROTAS
         */
        private function setPrefix() {
            //INFORMAÇÕES DA URL ATUAL
            $parseUrl = parse_url($this->url);
            /* echo "<pre>";
            print_r($parseUrl);
            echo "</pre>";
            exit; */

            # ==================================================

            //DEFINE O PREFIXO
            $this->prefix = $parseUrl['path']  ?? '';
        }

    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR ADICIONAR UMA ROTA NA CLASSE
         *
         * @param string $method
         * @param string $route
         * @param array $params
         */
        private function addRoute($method, $route, $params = []) {
            //TESTE
            /* echo "<pre>";
            print_r($method);
            echo "</pre>";

            echo "<pre>";
            print_r($route);
            echo "</pre>";

            echo "<pre>";
            print_r($params);
            echo "</pre>";
            exit; */

            # ==================================================

            //VALIDAÇÃO DOS PARÂMETROS
            foreach($params as $key=>$value) {
                if($value instanceof Closure) {
                    $params['controller'] = $value;
                    unset($params[$key]);
                    continue;
                }
            }
            /* echo "<pre>";
            print_r($params);
            echo "</pre>"; 
            exit; */

        // =====================================================================

            //VARIÁVEIS DA ROTA
            $params['variables'] = [];

            # ==================================================

            //PADRÃO DE VALIDAÇÃO DAS VARIÁVEIS DAS ROTAS
            $patternVariable = '/{(.*?)}/';

            if(preg_match_all($patternVariable, $route, $matches)) {

                $route = preg_replace($patternVariable, '(.*?)', $route);

                $params['variables'] = $matches[1];

                /* echo "<pre>";
                print_r($matches);
                echo "</pre>";
                exit; */
            }

        // =====================================================================

            //PADRÃO DE VALIDAÇÃO DA URL
            $patternRoute = '/^'.str_replace('/', '\/', $route).'$/';
            /* echo "<pre>";
            print_r($patternRoute);
            echo "</pre>";
            exit; */

            # ==================================================

            //ADICIONAR A ROTA DENTRO DA CLASSE
            $this->routes[$patternRoute][$method] = $params;
            /* echo "<pre>";
            print_r($this);
            echo "</pre>";
            exit; */

        }

    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR DEFINIR UMA ROTA DE GET
         *
         * @param string $route
         * @param array $params
         */
        public function get($route, $params = []){
            return $this->addRoute('GET', $route, $params);
        }
    
    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR DEFINIR UMA ROTA DE POST
         *
         * @param string $route
         * @param array $params
         */
        public function post($route, $params = []){
            return $this->addRoute('POST', $route, $params);
        }
    
    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR DEFINIR UMA ROTA DE PUT
         *
         * @param string $route
         * @param array $params
         */
        public function put($route, $params = []){
            return $this->addRoute('PUT', $route, $params);
        }

    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR DEFINIR UMA ROTA DE DELETE
         *
         * @param string $route
         * @param array $params
         */
        public function delete($route, $params = []){
            return $this->addRoute('DELETE', $route, $params);
        }
    
    // =======================================================================


        /**
         *  MÉTODO RESPONSÁVEL POR RETORNAR A URI DESCONSIDERANDO O PREFIXO 
         *
         * @return string
         */
        private function getUri() {
            //URI DA REQUEST
            $uri = $this->request->getUri();
            /* echo "<pre>";
            print_r($uri);
            echo "</pre>";
            exit;
 */
            # ==================================================

            //FATIA A URI COM O PREFIXO
            $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];
            /* echo "<pre>";
            print_r($xUri);
            echo "</pre>";
            exit; */

            # ==================================================

            //RETORNAR A URI SEM PREFIXO
            return end($xUri);
        }

    // =======================================================================

        /**
         *  MÉTODO RESPONSÁVEL POR RETORNAR OS DADOS DA ROTA ATUAL
         *
         * @return array
         */
        private function getRoute() {
            //URI
            $uri = $this->getUri();
            /* echo "<pre>";
            print_r($uri);
            echo "</pre>";
            exit; */

            # ==================================================

            //METHOD
            $httpMethod = $this->request->getHttpMethod(); // SAÌDA: GET
            /* echo "<pre>";
            print_r($httpMethod);
            echo "</pre>";
            exit; */

            # ==================================================

            //VALIDA AS ROTAS
            foreach($this->routes as $patternRoute=>$methods) {
                /* echo "<pre>";
                print_r($patternRoute);
                echo "</pre>";
                exit; */

                # ==================================================

                //VERIFICA SE A URI BATE O PADRÃO
                if(preg_match($patternRoute, $uri, $matches)) {
                    //VERIFICA O MÉTODO
                    if(isset($methods[$httpMethod])) {
                        /* echo "<pre>";
                        print_r($matches);
                        echo "</pre>";
                        exit; */

                        # ==================================================

                        //REMOVE A PRIMEIRA POSIÇÃO
                        unset($matches[0]);
                        /* echo "<pre>";
                        print_r($matches);
                        echo "</pre>";
                        exit; */

                        # ==================================================

                        //VARIÁVEIS PROCESSADAS
                        $keys = $methods[$httpMethod]['variables'];
                        $methods[$httpMethod]['variables'] = array_combine($keys, $matches);
                        $methods[$httpMethod]['variables']['request'] = $this->request;
                        /* echo "<pre>";
                        print_r($keys);
                        echo "</pre>";
                        exit; */

                        /* echo "<pre>";
                        print_r($methods);
                        echo "</pre>";
                        exit; */

                        # ==================================================

                        //RETORNO DOS PARÂMETROS DA ROTA
                        return $methods[$httpMethod];

                    }

                    //MÉTODO NÃO PERMITIDO/DEFINIDO
                    throw new Exception("Método não permitido", 405);
                }
            }

           //URI NÃO ENCONTRADA
            throw new Exception("URL não encontrada", 404);
        }

    // =======================================================================

        /**
         * MÉTODO RESPONSÁVEL POR EXECUTAR A ROTA ATUAL
         *
         * @return Response
         */
        public function run() {
            try {
                /* throw new Exception("Página não encontrada", 404); */

                # ==================================================
                
                //OBTÉM A ROTA ATUAL
                $route = $this->getRoute();
                /* echo "<pre>";
                print_r($route);
                echo "</pre>";
                exit;  */// Exemplo: http://127.0.0.1:8080/pagina/10/consultar ($idPaginha e $acao)

                # ==================================================

                //VERIFICA O CONTROLADOR
                if(!isset($route['controller'])) {
                    throw new Exception("A URL não pode ser processada", 500);
                }

                # ==================================================

                //ARGUMENTOS DA FUNÇÃO
                $args = [];

                # ==================================================

                //REFLECTION
                $reflection = new ReflectionFunction($route['controller']);
                foreach($reflection->getParameters() as $parameter) {
                    /* echo "<pre>";
                    print_r($parameter);
                    echo "</pre>";
                    exit; */

                    $name = $parameter->getName();
                    $args[$name] = $route['variables'][$name] ?? '';
                    /* echo "<pre>";
                    print_r($args);
                    echo "</pre>";
                    exit; */

                }

                # ==================================================

                //RETORNA A EXECUÇÃO DA FUNÇÃO
                return call_user_func_array($route['controller'], $args);

                # ==================================================

            } catch(Exception $e) {
                return new Response($e->getCode(), $e->getMessage());
            }
        }

}