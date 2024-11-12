<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ClienteDAO;//aqui eu irei colocar meus códigos SQL 
use App\Models\Entidades\Cliente;
//aqui estou chamando a minha entidade

class ClienteController extends Controller
{//por meio de herança estou buscando os métodos que estão lá em Controller

    public function cadastro()
    {//nome do método que usuário vai colocar na URL
        //chama o arquivo que está na view
        $this->render('/cliente/index');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        //como o form de cadastro é novo
        //limpo o formulario e limpo a mensagem
    }

    public function salvar()
    {
        $cliente = new Cliente();
        //criou uma instancia de Cliente

        //neste momento a variavel cliente vai usar o método set para modificar os dados cliente

        $cliente->setNome($_POST['nome']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->setDTNasc($_POST['dtnasc']);
        $cliente->setCPF($_POST['cpf']);
        

        Sessao::gravaFormulario($_POST);
        //grava na sessão para poder recuperar depois


        $clienteDAO = new CLienteDAO();
        //crio uma instancia do DAO para salvar no banco de dados

        if($clienteDAO->salvar($cliente)){
            $this->redirect('/cliente/sucesso');
        }else{
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }
    
    public function sucesso()
    {
        if(Sessao::retornaValorFormulario('nome')) {
            $this->render('/cliente/sucesso');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        }else{
            $this->redirect('/');
        }
    }

    public function index()
    {
        $this->redirect('/cliente/cadastro');
    }

}