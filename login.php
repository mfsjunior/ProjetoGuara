<?php

namespace App\Controllers;

use PDO;


class LoginController extends Controller
{
    public function login()
    {
        // Conexão com o banco de dados
        $host = 'localhost';
        $dbname = 'seu_banco_de_dados';
        $email = 'email';
        $senha = 'senha';

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $email, $senha);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Verifica se o formulário foi enviado
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                // Consulta ao banco de dados
                $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verifica a senha
                if ($user_data && password_verify($senha, $user_data['senha'])) {
                    $_SESSION['user_id'] = $user_data['id'];
                    echo "Login bem-sucedido!";
                    //resposta de informacoes
                    $stmt = $conn->prepare("SELECT * FROM USER WHERE email = :email");
                    $stmt->bindParam(':email', $useremail);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo "<p>Nome: " . htmlspecialchars($user_data['nome']) . "</p>";
                        echo "<p>Email: " . htmlspecialchars($user_data['email']) . "</p>";
                    }
                } else {
                    echo "Email ou senha inválidos.";
                }
            }
        }
    }
    if (isset($_SESSION['email'])) {
        echo "<a href='logout. php'>Log out</a>"; 
        } 

    else {
        echo "<a href='login. php'>Member Area</a>"; 
         }
}