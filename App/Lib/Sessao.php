<?php

namespace App\Lib;
// num conjunto chamado LIB

class Sessao // serve para validar um conjunto de situações
{
    public static function gravaMensagem($mensagem){
        //este método é estatico para ser acessado de qualquer local 
        $_SESSION['mensagem'] = $mensagem;
        //uma variável de sessão recebe uma mensagem
    }

    public static function limpaMensagem(){
        unset($_SESSION['mensagem']);
        //aqui a função/método unset serve para limpar a variável de sessão
    }

    public static function retornaMensagem(){
        return (
    $_SESSION['mensagem']) ? 
        $_SESSION['mensagem'] : "";
        //ifternário 
    }

    public static function gravaFormulario($form){
        $_SESSION['form'] = $form;
        //retorna na variável de sessão o form que foi preenchido
    }

    public static function limpaFormulario(){
        unset($_SESSION['form']);
        //limpar fomulário
    }

public static function retornaValorFormulario($key){
        return (isset($_SESSION['form'][$key])) ? $_SESSION['form'][$key] : "";//retorna os valores que foram enviados pelo formulário, mas por algum motivo a página voltou e não guardou os dados, então ele recoloca os dados nos respectivos campos do formulário
    }

    public static function existeFormulario(){
        return (isset($_SESSION['form'])) ? $_SESSION['form'] : "";
    }
}