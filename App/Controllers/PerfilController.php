<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\PerfilDAO;
use App\Models\Entidades\Perfil;

class PerfilController extends Controller
{
    public function cadastro()
    {
        $this->render('/perfil/cadastrar');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }
	
	public function teste()
    {
        $this->render('/perfil/testar');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    public function salvar()
    {
        $Perfil = new Perfil();
        $Perfil->setNome($_POST['nome']);

        Sessao::gravaFormulario($_POST);

        $perfilDAO = new PerfilDAO();

        if($perfilDAO->verificaNome($_POST['nome'])){
            Sessao::gravaMensagem("Nome existente");
            $this->redirect('/perfil/cadastro');
        }

        if($perfilDAO->salvar($Perfil)){
            $this->redirect('/perfil/sucesso');
        }else{
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }
    
    public function sucesso()
    {
        if(Sessao::retornaValorFormulario('nome')) {
            $this->render('/perfil/sucesso');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        }else{
            $this->redirect('/');
        }
    }

public function listar (){

$perfilDAO = new PerfilDAO();


if($perfilDAO->listar()){

        $this->setViewParam('listarPerfis',$perfilDAO->listar( ));
        $this->render('/perfil/listar');
            
        }else{
            Sessao::gravaMensagem("Erro ao listar perfis");
        }
 
 }
 
public function testar()
{
    // Captura os dados enviados pelo formulário
    $perfilId = $_POST['perfil_id'] ?? null;

    // Define os nomes correspondentes aos IDs
    $perfis = [
        1 => 'Admin',
        2 => 'Usuário Padrão',
        3 => 'Fornecedor'
    ];

    if ($perfilId && isset($perfis[$perfilId])) {
        // Salva nas variáveis de sessão
        $_SESSION['PerfilTemp.id'] = $perfilId;
        $_SESSION['PerfilTemp.nome'] = $perfis[$perfilId];
    } 

    // Redireciona de volta para evitar reenvio do formulário
    $this->redirect('/');
}


}