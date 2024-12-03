<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UsuarioDAO;
use App\Models\Entidades\Usuario;

class UsuarioController extends Controller
{
    public function cadastro()
    {
        $this->render('/usuario/cadastrar');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    public function salvar()
    {
        $Usuario = new Usuario();
        $Usuario->setNome($_POST['nome']);
        $Usuario->setEmail($_POST['email']);

        Sessao::gravaFormulario($_POST);

        $usuarioDAO = new UsuarioDAO();

        if($usuarioDAO->verificaEmail($_POST['email'])){
            Sessao::gravaMensagem("Email existente");
            $this->redirect('/usuario/cadastro');
        }

        if($usuarioDAO->salvar($Usuario)){
            $this->redirect('/usuario/menu');
        }else{
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }
    
    public function menu()
    {
        if(Sessao::retornaValorFormulario('nome')) {
            $this->render('/usuario/menu');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        }else{
            $this->redirect('/');
        }
    }

    public function listar (){

        $usuarioDAO = new UsuarioDAO();


        if($usuarioDAO->listar()){

                $this->setViewParam('listarUsuarios',$usuarioDAO->listar( ));
                $this->render('/usuario/listar');
                    
                }else{
                    Sessao::gravaMensagem("Erro ao listar usuários");
                }
        
        }



    public function index()
    {
        $this->redirect('/usuario/cadastro');
    }


    public function edicao($params){

        $id = $params[0];
        

        if(ctype_digit($id)) {
        

         $usuarioDAO = new UsuarioDAO();

         $usuario = $usuarioDAO->listarUm($id)[0]; 
        
            
        
                $this->setViewParam('editarusuario',$usuario);
                $this->render('/usuario/editar');
                Sessao::limpaFormulario();
            Sessao::limpaMensagem();
         
              
      
        }

    }
    public function atualizar()
    {
        if(empty($_POST)) {
            throw new \Exception("Página não encontrada.", 404);
        } else {
        

        $usuario = new Usuario();
        $usuario->setId(trim($_POST['id']));           
        $usuario->setNome(trim($_POST['nome']));
        $usuario->setEmail(trim($_POST['email']));
        
      
        $usuarioDAO = new UsuarioDAO();
        
    
       

      if ($usuarioDAO->editar($usuario)) {
                Sessao::gravaMensagem("Usuario editado com sucesso");
                 $this->redirect('/usuario/listar/');
        } else {
                $this->redirect('/usuario/listar/'.$usuario->getId());
            } 
        }       
    }
    public function deletar($params)
    {

        $id = $params[0];

        $usuario = new Usuario();
        $usuario->setId($id);           
       
      
        $usuarioDAO = new UsuarioDAO();
        
    
       

      if ($usuarioDAO->excluir($usuario)) {
                Sessao::gravaMensagem("Usuario excluído  com sucesso");
                 $this->redirect('/usuario/listar/');
        } else {
                $this->redirect('/usuario/listar/'.$usuario->getId());
            } 
          
    }

}