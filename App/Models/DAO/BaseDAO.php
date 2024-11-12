<?php

namespace App\Models\DAO;
/*
DAO representa uma forma de se comunicar com o banco de dados, ela é uma especialista nisso, desta forma qualquer outro dao vai utilizar este 
para utilizar qualquer comando de banco de dados
*/
use App\Lib\Conexao;

abstract class BaseDAO
{
    private $conexao; //cria  a variável de conexão

    public function __construct()
    {
        $this->conexao = Conexao::getConnection(); //vai lá na classe conexão de coloca uma conexão na variavel que foi criada 
    }

    public function select($sql) //recebe o paramento que é comando da conexão
    {
        if(!empty($sql)) // se o sql não for vazio 
        {
            return $this->conexao->query($sql); // chama a conexão e realiza um select ( buscar )
            
        }
    }

    public function insert($table, $cols, $values) //recebe tres parâmetros Nome da tabela, as colunas e o values 
    {
        if(!empty($table) && !empty($cols) && !empty($values))//verifica se alguma das variáveis está vazia
        {
            $parametros    = $cols;
            $colunas       = str_replace(":", "", $cols);// retira o ":"  e coloca "" (nada)
            /*
                INSERT INTO usuario (nome,email) VALUES (:nome,:email);
            */
            $stmt = $this->conexao->prepare("INSERT INTO $table ($colunas) VALUES ($parametros)");//monta o insert
            $stmt->execute($values);//executa o insert que foi preparado na linha anterior

            return $stmt->rowCount();//verifica se alguma linha foi alterada, se foi um insert, alguma tem que ser 
        }else{
            return false;//caso dê erro, retorna falso 
        }
    }
}