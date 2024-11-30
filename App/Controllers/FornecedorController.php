<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\FornecedorDAO;
use App\Models\Entidades\Fornecedor;

class FornecedorController extends Controller
{
    public function cadastro()
    {
        $this->render('/fornecedor/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    public function salvar()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->setNome($_POST['nome']);
        $fornecedor->setNomeFantasia($_POST['nomeFantasia']);
        $fornecedor->setCNPJ($_POST['cnpj']);
        $fornecedor->setInscricaoEstadual($_POST['inscricaoEstadual']);
        $fornecedor->setEndereco($_POST['endereco']);
        $fornecedor->setTipoDeServico($_POST['tipoDeServico']);
        $fornecedor->setTelefone($_POST['telefone']);
      
        Sessao::gravaFormulario($_POST);

        $fornecedorDAO = new FornecedorDAO();
        if($fornecedorDAO->verificaCNPJ($_POST['cnpj'])){
            Sessao::gravaMensagem("Esse CNPJ já está no nosso sistema");
            $this->redirect('/fornecedor/cadastro');
        }

        if($fornecedorDAO->salvar($fornecedor)){
            $this->redirect('/fornecedor/sucesso');
        }else{
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }
    
    public function sucesso()
    {
        if(Sessao::retornaValorFormulario('nome')) {
            $this->render('/fornecedor/sucesso');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        }else{
            $this->redirect('/');
        }
    }

    public function index()
    {
        $this->redirect('/fornecedor/cadastro');
    }

}