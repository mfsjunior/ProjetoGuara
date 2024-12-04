<?php

namespace App\Models\Entidades;
/*
Cria a entidade e cria suas variáveis, que só podem ser acessadas por meio dos métodos getter and setters por serem privadas
*/
class Perfil
{
	private $id;
	private $nome;
 

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

    
}