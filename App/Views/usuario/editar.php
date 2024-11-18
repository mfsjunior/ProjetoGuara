<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <h3>Editar Usuários</h3>

            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>

            <form class="row g-3" action="http://<?php echo APP_HOST; ?>/usuario/atualizar" method="POST" id="form_cadastro" enctype="multipart/form-data">
            
          
           

            
                    <input type="hidden" name="id" value=<?php echo $viewVar['editarusuario']['id']; ?>>
                    
           

           <div class="form-group">
           
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control"  value="<?php echo $viewVar['editarusuario']['nome'];?>">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="" value="<?php echo $viewVar['editarusuario']['email'];?>" required>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>
        </div>
    
            </form>
       

</div>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6  text-right">
                
            <a class="btn end-50"  href="http://<?php echo APP_HOST; ?>/usuario/listar" class="btn btn-info"><button type="submit" class="btn btn-success btn-sm list">Listar</button></a>
</div>
            </div>
        
            
        </div>
     
    </div>
    
</div>

</div>
</main>
