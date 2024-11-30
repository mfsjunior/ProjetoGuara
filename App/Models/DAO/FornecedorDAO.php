<?php

namespace App\Models\DAO;

use App\Models\Entidades\Recuperar;

class RecuperarDAO extends BaseDAO
{
    public function atualizarSenha(Recuperar $recuperar)
    {
        try {
            // Pegando os dados do objeto Recuperar
            $nome1   = $recuperar->getNome1();
            $senha1  = $recuperar->getSenha1();
            $nome2   = $recuperar->getNome2();
            $senha2  = $recuperar->getSenha2();
            $nome3   = $recuperar->getNome3();
            $senha3  = $recuperar->getSenha3();

            // Verificando se o nome1 existe na tabela de usuarios e atualizando a senha1
            if (!empty($nome1)) {
                $sql = "UPDATE usuario SET senha = :senha1 WHERE nome = :nome1";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':nome1', $nome1);
                $stmt->bindParam(':senha1', $senha1);
                $stmt->execute();
            }

            // Verificando se o nome2 existe na tabela de clientes e atualizando a senha2
            if (!empty($nome2)) {
                $sql = "UPDATE cliente SET senha = :senha2 WHERE nome = :nome2";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':nome2', $nome2);
                $stmt->bindParam(':senha2', $senha2);
                $stmt->execute();
            }

            // Verificando se o nome3 existe na tabela de fornecedores e atualizando a senha3
            if (!empty($nome3)) {
                $sql = "UPDATE fornecedor SET senha = :senha3 WHERE nome = :nome3";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':nome3', $nome3);
                $stmt->bindParam(':senha3', $senha3);
                $stmt->execute();
            }

            // Se alguma atualização for realizada, retorna true
            return true;

        } catch (\Exception $e) {
            // Caso haja erro, lança exceção
            throw new \Exception("Erro ao atualizar as senhas: " . $e->getMessage(), 500);
        }
    }
}
