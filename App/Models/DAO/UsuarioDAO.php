<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;

class UsuarioDAO extends BaseDAO
{
    public function verificaEmail($email)
    {
        try {

            $query = $this->select(
                "SELECT * FROM usuario WHERE email = '$email' "
            );

            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public  function salvar(Usuario $usuario) {
        try {
            $nome      = $usuario->getNome();
            $email     = $usuario->getEmail();
            $senha     = $usuario->getSenha();
            return $this->insert(
                'usuario',
                ":nome,:email,:senha",
                [
                    ':nome'=>$nome,
                    ':email'=>$email,
                    ':senha' => $senha

                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }



    //difente dos outros métodos, este visa listar os usuários cadastrados - realizando o camando SELECT 
    public function listar()
    {
        try {

            $query = $this->select(
                "SELECT SUBSTRING( nome ,1 , 7 ) as nome, email FROM usuario" //formata o camando para aquilo que o BaseDAO pediu 
            );

        return $query->fetchAll(\PDO::FETCH_ASSOC);// Retorna uma busca em ALL -> todos 

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }




}