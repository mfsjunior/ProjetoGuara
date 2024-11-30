<?php

namespace App\Models\DAO;

use App\Models\Entidades\Fornecedor;

class FornecedorDAO extends BaseDAO
{
    public function verificaCNPJ($cnpj)
    {
        try {

            $query = $this->select(
                "SELECT * FROM fornecedor WHERE cnpj = '$cnpj' "
            );

            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public  function salvar(Fornecedor $fornecedor) {
        try {
            $nome      = $fornecedor->getNome();
            $nomeFantasia      = $fornecedor->getNomeFantasia();
            $cnpj      = $fornecedor->getCNPJ();
            $inscricaoEstadual      = $fornecedor->getInscricaoEstadual();
            $endereco      = $fornecedor->getEndereco();
            $tipoDeServico      = $fornecedor->getTipoDeServico();
            $telefone      = $fornecedor->getTelefone();
           
            return $this->insert(
                'fornecedor',
                ":nome,:nomefantasia,:CNPJ,:InscricaoEstadual,:Endereco,:tiposervico,:telefone",
                [
                    ':nome'=>$nome,
                    ':nomefantasia'=>$nomeFantasia,
                    ':CNPJ'=>$cnpj,
                    ':InscricaoEstadual'=>$inscricaoEstadual,
                    ':Endereco'=>$endereco,
                    ':tiposervico'=>$tipoDeServico,
                    ':telefone'=>$telefone
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }
}