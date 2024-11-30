<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Fornecedor</h3>

            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/fornecedor/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control"  name="nome" placeholder="" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="nomeFantasia">Nome Fantasia:</label>
                    <input type="text" class="form-control" name="nomeFantasia" placeholder="" value="<?php echo $Sessao::retornaValorFormulario('nomeFantasia'); ?>" required>
                </div>

                <div class="form-group">
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" min='1' max ='99999999999999' class="form-control" name="cnpj" placeholder="" value="<?php echo $Sessao::retornaValorFormulario('cnpj'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="inscricaoEstadual">Inscrição Estadual:</label>
                    <input type="text" min='1' max='999999999' class="form-control" name="inscricaoEstadual" placeholder="" value="<?php echo $Sessao::retornaValorFormulario('inscricaoEstadual'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" placeholder="" value="<?php echo $Sessao::retornaValorFormulario('endereco'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="tipoDeServico">Tipo de Serviço:</label>
                    <input type="text" class="form-control" name="tipoDeServico" placeholder="" value="<?php echo $Sessao::retornaValorFormulario('tipoDeServico'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" name="telefone" placeholder="" value="<?php echo $Sessao::retornaValorFormulario('telefone'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="nome">Senha</label>
                    <input type="password" class="form-control"  name="senha" placeholder="Sua senha" value="<?php echo $Sessao::retornaValorFormulario('senha'); ?>" required>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>