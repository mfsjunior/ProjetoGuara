<?php

namespace App\Models\Entidades;
/*
Cria a entidade e cria suas variáveis, que só podem ser acessadas por meio dos métodos getter and setters por serem privadas
*/


class Cliente
{
private $id;
private $nome;
private $dtnasc;
private $cpf;
private $telefone;
private $senha;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDTNasc()
    {
        return $this->dtnasc;
    }

    public function setDTNasc($dtnasc)
    {
        $this->dtnasc = $dtnasc;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    
    public function getCPF()
    {
        return $this->dtnasc;
    }

    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
    }


    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
}