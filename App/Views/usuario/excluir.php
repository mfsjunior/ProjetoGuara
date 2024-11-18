
   <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">EXCLUSÃO DE AVISO</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              
              
            </div>
          </div>

          <div class="container">


          <div class="panel-body">  
    <div class="row">
      <form class="form-horizontal" method="POST" action="http://<?php echo APP_HOST; ?>/aviso/excluir">
        <div class="col-lg-12">
         
           
            <div class="panel-body">    
             <div class="col-lg-12">
              <section class="panel">
                <div class="alert alert-info" role="alert">
                  <b>Tem certeza que deseja excluir o aviso selecionado?</b>
                  <p>(<?php echo $viewVar['aviso']->getNome(); ?>)</p>
                </div>
              
            </div>
          
          </div>
        </section>
      </div>


      <div class="col-md-12">
        <div class="panel-body" align="right">
          <input type="hidden" name="id" value="<?php echo $viewVar['aviso']->getId() ?>">      
          <button class="btn btn-danger" type="submit" >Confirmar Exclusão</button>
          <a href="http://<?php echo APP_HOST; ?>/aviso/listaravisos" class="btn btn-success btn-sm list">Voltar</a>
        </div>
      </div>

    </div>        
  </form>
</div>
</div>
</div>
</main>


