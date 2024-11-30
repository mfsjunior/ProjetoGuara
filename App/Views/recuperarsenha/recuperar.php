<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Usuário</h3>

            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/recuperar/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="nome1">Nome do usuario</label>
                    <input type="text" class="form-control"  name="nome1" placeholder="" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>">
                </div>
                <div class="form-group">
                    <label for="senha1">Redefinir Senha de usuario</label>
                    <input type="password" class="form-control"  name="senha1" placeholder="Sua nova senha" value="<?php echo $Sessao::retornaValorFormulario('senha1'); ?>">
                </div>

                <div class="form-group">
                    <label for="nome2">Nome do Cliente</label>
                    <input type="text" class="form-control"  name="nome2" placeholder="" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>">
                </div>
                <div class="form-group">
                    <label for="senha2">Redefinir Senha de Cliente</label>
                    <input type="password" class="form-control"  name="senha2" placeholder="Sua nova senha" value="<?php echo $Sessao::retornaValorFormulario('senha2'); ?>">
                </div>

                <div class="form-group">
                    <label for="nome3">Nome do Fornecedor</label>
                    <input type="text" class="form-control"  name="nome3" placeholder="" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" >
                </div>
                <div class="form-group">
                    <label for="senha3">Redefinir Senha de Fornecedor</label>
                    <input type="password" class="form-control"  name="senha3" placeholder="Sua nova senha" value="<?php echo $Sessao::retornaValorFormulario('senha3'); ?>" >
                </div>
                

                <button type="submit" class="btn btn-success btn-sm">Redefinir</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
