<?php

namespace App\Models\DAO;

use App\Models\Entidades\Perfil;

class PerfilDAO extends BaseDAO
{
    public function verificaNome($nome)
    {
        try {

            $query = $this->select(
                "SELECT * FROM perfil WHERE nome = '$nome' "
            );

            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public  function salvar(Perfil $perfil) {
        try {
            $nome      = $perfil->getNome();
            return $this->insert(
                'perfil',
                ":nome",
                [
                    ':nome'=>$nome,
                    
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }



    //difente dos outros métodos, este visa listar os perfis cadastrados - realizando o camando SELECT 
    public function listar()
    {
        try {

            $query = $this->select(
                "SELECT SUBSTRING( nome ,1 , 7 ) as nome, id FROM perfil" //formata o camando para aquilo que o BaseDAO pediu 
            );

        return $query->fetchAll(\PDO::FETCH_ASSOC);// Retorna uma busca em ALL -> todos 

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }




}