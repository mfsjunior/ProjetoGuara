<div class="container">
     <div class="starter-template">
            <h1>Primeira aplicação</h1>
			<?php
				echo $_SESSION['Perfil.id'];
				echo $_SESSION['Perfil.nome'];
				
				if(isset($_SESSION['PerfilTemp.nome'],$_SESSION['PerfilTemp.id'])){
					echo $_SESSION['PerfilTemp.nome'];
					echo $_SESSION['PerfilTemp.id'];
				}
				
			?>
    </div>
</div>
