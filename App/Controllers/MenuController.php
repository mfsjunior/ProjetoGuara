<?php

namespace App\Controllers;

use App\Models\DAO\MenuDAO;

class MenuController {
    private $menuDAO;

    public function __construct() {
        $this->menuDAO = new MenuDAO();
    }

    /**
     * Renderiza o menu baseado no tipo de usuário.
     */
    public function renderizarMenu() {
        session_start();


        // Obtém o tipo de usuário da sessão
        $tipoUsuario = $_SESSION['tipo_usuario'] ?? 'usuario'; // Padrão para 'usuario'

        // Obtém os itens do menu para o tipo de usuário
        $menuItens = $this->menuDAO->getMenuItems($tipoUsuario);

        // Renderiza o menu correspondente
        include '../App/Views/cliente/menu.php'; // Cabeçalho comum
       
    }
}