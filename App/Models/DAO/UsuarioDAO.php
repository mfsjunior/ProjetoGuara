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
            return $this->insert(
                'usuario',
                ":nome,:email",
                [
                    ':nome'=>$nome,
                    ':email'=>$email
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }
    public function listar()
    {
        try {

            $query = $this->select(
                "SELECT SUBSTRING( nome ,1 , 7 ) as nome, email FROM usuario"
            );

        return $query->fetchAll(\PDO::FETCH_ASSOC);

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }




}