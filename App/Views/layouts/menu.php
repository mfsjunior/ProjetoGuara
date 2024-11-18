<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://<?php echo APP_HOST; ?>">Projeto Guará</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav dropdown">
                <li <?php if($viewVar['nameController'] == "HomeController") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>" >Home</a>
                </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Usuário
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item"  href="http://<?php echo APP_HOST; ?>/usuario/cadastro">>CADASTRAR</a><br>
          <a class="dropdown-item"  href="http://<?php echo APP_HOST; ?>/usuario/listar">>LISTAR</a>
        </div>
        
                    
        
                <li <?php if($viewVar['nameController'] == "ClienteController") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/cliente/cadastro" >Cadastro de Cliente</a>
                </li>
                <li <?php if($viewVar['nameController'] == "FornecedorController") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/fornecedor/cadastro" >Cadastro do Fornecedor</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


