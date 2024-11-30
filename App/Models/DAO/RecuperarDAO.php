<?php

namespace App\Models\DAO;

use App\Models\Entidades\Recuperar;


class RecuperarDAO extends BaseDAO
{
    // Tive que colocar um metodo updatesenha que não existia no codigo original para conseguir trocar as senhas
    public function updatesenha($table, $set, $where, $values)
    {
        if (!empty($table) && !empty($set) && !empty($where) && !empty($values)) {
            $sql = "UPDATE $table SET $set WHERE $where";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute($values);

            return $stmt->rowCount();
        }
        return false;
    }

    public function salvar(Recuperar $recuperar)
    {
        try {
            // Pegando os dados do objeto Recuperar
            $nome1   = $recuperar->getNome1();
            $senha1  = $recuperar->getSenha1();
            $nome2   = $recuperar->getNome2();
            $senha2  = $recuperar->getSenha2();
            $nome3   = $recuperar->getNome3();
            $senha3  = $recuperar->getSenha3();
            

            // Se nome1 foi fornecido, atualiza a senha1 na tabela correspondente
            if (!empty($nome1)) {
                // Atualiza a senha na tabela 'usuario' onde o nome corresponde ao fornecido
                $set = "senha = :senha";  // Aqui, "senha" é a coluna que vai ser atualizada
                $where = "nome = :nome";  // Aqui, "nome" é a coluna na tabela 'usuario' que será comparada
                $values = [':nome' => $nome1, ':senha' => $senha1];  // Passando o valor de 'nome' e 'senha'
                
                var_dump($set, $where, $values); // Verifica os dados que estão sendo passados
                $this->updatesenha('usuario', $set, $where, $values);  // Chama o método update com os parâmetros ajustados
            }

            // Se nome2 foi fornecido, atualiza a senha2 na tabela correspondente
            if (!empty($nome2)) {
                $set = "senha = :senha";
                $where = "nome = :nome";
                $values = [':nome' => $nome2, ':senha' => $senha2];
                $this->updatesenha('cliente', $set, $where, $values);
            }

            // Se nome3 foi fornecido, atualiza a senha3 na tabela correspondente
            if (!empty($nome3)) {
                $set = "senha = :senha";
                $where = "nome = :nome";
                $values = [':nome' => $nome3, ':senha' => $senha3];
                $this->updatesenha('fornecedor', $set, $where, $values);
            }

            // Se alguma atualização for realizada, retorna true, senão false
            return true;

        } catch (\Exception $e) {
            // Caso haja erro, lança exceção
            throw new \Exception("Erro ao atualizar as senhas: " . $e->getMessage(), 500);
        }
    }
}"