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
                "SELECT id, SUBSTRING( nome ,1 , 7 ) as nome, email FROM usuario" //formata o camando para aquilo que o BaseDAO pediu 
            );

        return $query->fetchAll(\PDO::FETCH_ASSOC);// Retorna uma busca em ALL -> todos 

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
    public  function listarUm($id) 
    {
    
        try {

            $query = $this->select(
                "SELECT * FROM usuario where id = ".$id //formata o camando para aquilo que o BaseDAO pediu 
            );

        return $query->fetchAll(\PDO::FETCH_ASSOC);// Retorna uma busca em ALL -> todos 

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
       
        return $query->fetchAll(\PDO::FETCH_ASSOC);       
    }



    public  function editar(Usuario $usuario) 
    {
        try 
        {
            $id             = $usuario->getId();
            $nome           = $usuario->getNome();
            $email          = $usuario->getEmail();
            
   
  

            return $this->update(
                'usuario',
                "nome = :nome, email = :email",
                [
                    ':id'=>$id,
                    ':nome'=>$nome,
                    ':email'=>$email
                  

                ],
                "id = :id"
            );
        

        }
        catch (\Exception $e){
            throw new \Exception($e, 500);
        }
    }


    public function excluir(Usuario $usuario) 
    {
        try {   

            $id = $usuario->getId();
            
            return $this->delete('usuario',"id = $id");   
                     
        } catch(\Exception $e) {
            throw new \Exception("Erro ao deletar", 500);
       }
    }

}