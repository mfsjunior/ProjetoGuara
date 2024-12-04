<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Selecionar Perfil</h3>
			
			<?php 
			echo $_SESSION['Perfil.id'];
			echo $_SESSION['Perfil.nome'];
			
			if(isset($_SESSION['PerfilTemp.id'])){
				echo $_SESSION['PerfilTemp.id'];
			}
			if(isset($_SESSION['PerfilTemp.nome'])){
				echo $_SESSION['PerfilTemp.nome'];
			}
			
			?>

            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/perfil/testar" method="post">
                <div class="form-group">
                    <label for="perfil_id">Selecione um Perfil</label>
                    <select name="perfil_id" class="form-control" required>
                        <option value="">Selecione...</option>
                        <option value="1">Admin</option>
                        <option value="2">Usuário Padrão</option>
                        <option value="3">Fornecedor</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>