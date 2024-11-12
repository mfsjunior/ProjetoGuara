<?php

namespace App\Lib;

use PDO;
use PDOException;
use Exception;

class Conexao
{
    private static $connection; // variável privada e estática, isto para ser acessada de qualquer local do nosso código

    private function __construct(){}//construtor vazio, mas explícito

    public static function getConnection() {

        $pdoConfig  = DB_DRIVER . ":". "host=" . DB_HOST . ";"; //pega as variaveis globais que estão no arquivo App.php
        $pdoConfig .= "dbname=".DB_NAME.";";//e monta o texto de configuração do banco de dados, Drive do banco, nome do host e nome do banco

        try { 
            if(!isset($connection)){ //se diferente de definida, entra no laço 
                $connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);//cria uma instância da conexão
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // setá os atributos dela, por meio do PDO 
            }
            return $connection;// e retorna a conexão para uso
        } catch (PDOException $e) {
            throw new Exception("Erro de conexão com o banco de dados",500);//algum dado de conexão está errado 
        }
    }

    
}