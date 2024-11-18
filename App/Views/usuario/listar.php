<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Listar Usuários</h3>

<div class="panel-body">              
<table class="table">
<thead class="thead-dark">
<tr>
<th>NOME</th>
<th>E-MAIL</th>
</tr>
</thead>
<tbody>
<?php 
foreach($viewVar['listarUsuarios'] as $listar) {
?>
<tr>
<td><?php echo  $listar['nome']; ?></td>
<td><?php echo  $listar['email']; ?></td>
<?php


?>
<td>
<a title="editar" href="http://<?php echo APP_HOST; ?>/usuario/edicao/<?php echo  $listar['id']; ?>" class="btn btn-edit edit">Editar</a>
<a  title="excluir"href="http://<?php echo APP_HOST; ?>/usuario/deletar/<?php echo  $listar['id']; ?>" class="btn  btn-delarquivo">Excluir</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>                                     

        <div class=" col-md-3"></div>
    </div>
</div>






