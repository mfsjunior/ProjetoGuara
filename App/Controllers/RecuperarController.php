<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\RecuperarDAO;
use App\Models\Entidades\Recuperar;

class RecuperarController extends Controller
{
    public function cadastro()
    {
        $this->render('/recuperarsenha/recuperar');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    public function salvar()
    {
        $Recuperar = new Recuperar();
        $Recuperar->setNome1($_POST['nome1']);
        $Recuperar->setSenha1($_POST['senha1']);
        $Recuperar->setNome2($_POST['nome2']);
        $Recuperar->setSenha2($_POST['senha2']);
        $Recuperar->setNome3($_POST['nome3']);
        $Recuperar->setSenha3($_POST['senha3']);

    

        Sessao::gravaFormulario($_POST);

        $recuperarDAO = new RecuperarDAO();


        if($recuperarDAO->salvar($Recuperar)){
            $this->redirect('/recuperar/sucesso');
        }else{
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }
    
    public function sucesso()
    {
        if (Sessao::retornaValorFormulario('nome1') || Sessao::retornaValorFormulario('nome2') || Sessao::retornaValorFormulario('nome3')) {
            $this->render('/recuperarsenha/sucesso');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        }else{
            $this->redirect('/');
        }
    }




    public function index()
    {
        $this->redirect('/usuario/cadastro');
    }



}