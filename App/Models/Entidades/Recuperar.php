<?php

namespace App\Models\Entidades;
/*
Cria a entidade e cria suas variáveis, que só podem ser acessadas por meio dos métodos getter and setters por serem privadas
*/


class Recuperar
{
private $nome1;
private $senha1;
private $nome2;
private $senha2;
private $nome3;
private $senha3;

    public function getNome1()
    {
        return $this->nome1;
    }

    public function setNome1($nome1)
    {
        $this->nome1 = $nome1;
    }

    public function getSenha1()
    {
        return $this->senha1;
    }

    public function setSenha1($senha1)
    {
        $this->senha1 = $senha1;
    }




    public function getNome2()
    {
        return $this->nome2;
    }

    public function setNome2($nome2)
    {
        $this->nome2 = $nome2;
    }

    public function getSenha2()
    {
        return $this->senha2;
    }

    public function setSenha2($senha2)
    {
        $this->senha2 = $senha2;
    }




    public function getNome3()
    {
        return $this->nome3;
    }

    public function setNome3($nome3)
    {
        $this->nome3 = $nome3;
    }

    public function getSenha3()
    {
        return $this->senha3;
    }

    public function setSenha3($senha3)
    {
        $this->senha3 = $senha3;
    }
}