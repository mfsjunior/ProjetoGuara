

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Usuario</h3>

            <?php 
            // Exibir usuario da sessão
            $usuarioDAO = new UsuarioDAO($pdo);
            $usuario = $usuarioDAO->obterAvisos();

            foreach ($usuario as $usuario) {
                $tipoClass = 'alert-info'; // Default for informational messages
                if ($usuario['tipo'] == 'sucesso') {
                    $tipoClass = 'alert-success';
                } elseif ($usuario['tipo'] == 'erro') {
                    $tipoClass = 'alert-danger';
                } elseif ($usuario['tipo'] == 'usuario') {
                    $tipoClass = 'alert-warning';
                }
                echo "<div class='alert $tipoClass' role='alert'>{$usuario['mensagem']}</div>";

                // Deletar usuario após ser exibido (opcional)
                $usuarioDAO->deletarusuario($usuario['id']);
            }
            ?>

            <form action="http://<?php echo APP_HOST; ?>/usuario/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Seu nome" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>" required>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>

            <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Suponha que $clienteDAO->salvar() retorne um booleano indicando sucesso ou falha
                if ($usuarioDAO->salvar($usuario)) {
                    $usuarioDAO->criarusuario("Usuário cadastrado com sucesso!", "sucesso");
                    $this->redirect('/cliente/sucesso');
                } else {
                    $usuarioDAO->criarusuario("Erro ao cadastrar usuário. Verifique os dados.", "erro");
                }
            }
            ?>       

        </div>
        <div class="col-md-3"></div>
    </div>
</div>
