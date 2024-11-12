<?php

namespace App\Models\DAO;

use App\Models\Entidades\Cliente;
//preciso chamar a entidade que estou trabalhando

class ClienteDAO extends BaseDAO
{

/*
Aqui vamos especializar o comando la do DAO, onde esse salvar vai salvar uma entidade CLiente
*/
    public  function salvar(Cliente $cliente) {//espera um argumento, que é uma entidade Cliente 
        try {
            $nome      = $cliente->getNome();//recupera nome
            $telefone     = $cliente->getTelefone(); // recupera telefone
            $datanascimento     = $cliente->getDTNasc(); // recupera data de nascimento
            $cpf     = $cliente->getCPF();// recupera o cpf 
        

        //com esses dados em mão, agora pega-se as variáveis e montam a lógica do insert como o BaseDAO disse como deveria ser
        return $this->insert(
                'cliente',
                ":nome,:telefone,:datanascimento,:cpf",
                [
                    ':nome'=>$nome,
                    ':telefone'=>$telefone,
                    ':datanascimento'=>$datanascimento,
                    ':cpf'=>$cpf
                ]
            ); ///retorna True se certo e False se houver erro

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);//se der erro, retorna essa mensagem 
        }
    }
}