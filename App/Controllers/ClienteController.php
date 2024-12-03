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
        //$_POST -> indica o método utilizado para enviar os dados de um formulário para uma outra pagina 

        $cliente->setNome($_POST['nome']); //pega o nome que foi enviado 
        $cliente->setTelefone($_POST['telefone']); //pega o telefone que foi enviado via form
        $cliente->setDTNasc($_POST['dtnasc']);//pega a data de nascimento que foi enviado via form
        $cliente->setCPF($_POST['cpf']);//pega o CPF que foi enviado via form
        

        Sessao::gravaFormulario($_POST);
        //grava na sessão para poder recuperar depois


        $clienteDAO = new CLienteDAO();
        //crio uma instancia do DAO para salvar no banco de dados

        if($clienteDAO->salvar($cliente)){//chama o DAO que sabe falar com o banco de dados e pede para ele realizar um insert na base 
            $this->redirect('/cliente/menu');//redicionar para pagina cliente caso consiga salvar os dados do usuário
        }else{
            Sessao::gravaMensagem("Erro ao gravar");// coloca na sessão, em seu método gravarMensagem um mensagem de texto 
        }
    }
    
    public function menu()
    {
        if(Sessao::retornaValorFormulario('nome')) {
            $this->render('/cliente/menu');//redicionar para pagina sucesso caso consiga salvar o formulario

            Sessao::limpaFormulario(); // limpar o formulário 
            Sessao::limpaMensagem();//limpa a mensagem 
        }else{
            $this->redirect('/');//redireciona para a home
        }
    }

    public function index()
    {
        $this->redirect('/cliente/cadastro');//redireciona para a cadastro
    }

}

