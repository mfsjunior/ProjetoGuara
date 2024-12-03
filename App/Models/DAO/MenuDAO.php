<?php
use BaseDAO;
use PDO;
class MenuDAO{
    private $pdo;

    // Construtor: recebe a conexão com o banco de dados
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Busca os itens do menu no banco de dados.
     *
     * @param string $roleUsuario Permissão do usuário (ex.: 'user', 'admin').
     * @return array Lista de itens do menu.
     */
    public function getMenuItems($roleUsuario) {
        $stmt = $this->pdo->prepare("
            SELECT * FROM menu_items
            WHERE role IS NULL OR role = :role
            ORDER BY parent_id, order
        ");
        $stmt->execute(['role' => $roleUsuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}