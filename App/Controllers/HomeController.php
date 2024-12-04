<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
		if(isset($_SESSION['Perfil.nome'],$_SESSION['Perfil.id'])){}else{
		$_SESSION['Perfil.nome']="Admin";
		$_SESSION['Perfil.id']="1";}
		
        $this->render('home/home');
    }
}