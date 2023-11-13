<?php

namespace App\Model\Entity;
use \WilliamCosta\DatabaseManager\Database;

class Testimony{

    /**
     * ID DO DEPOIMENTO
     *
     * @var integer
     */
    public $id;

    /**
     * NOME DO USUÁRIO QUE FEZ O DEPOIMENTO
     *
     * @var string
     */
    public $nome;

    /**
     * MENSAGEM DO DEPOIMENTO
     * @var string
     */
    public $mensagem;

    /**
     * DATA DE PUBLICAÇÃO DO DEPOIMENTO
     *
     * @var string
     */
    public $data;

    // ======================================================================
    
    /**
     * Metodo Responsavel por cadastrar a instancia atual no banco de dados
     * @return boolean
     */
    public function cadastrar(){
        //DEFINE A DATA
        $this->data = date('Y-m-d H:i:s');
        /* echo "<pre>";
        print_r($this);
        echo "</pre>";
        exit; */
        
        //INSERE O DEPOIMENTOS NO BANCO DE DADOS
        $this->id = (new Database('depoimentos'))->insert([
            'nome'=> $this->nome,
            'mensagem'=> $this->mensagem,
            'data' => $this->data,
        ]);
        /* echo "<pre>";
        print_r($this);
        echo "</pre>";
        exit; */

        //SUCESSO
        return true;
    }
}