<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Listar Perfis</h3>



<div class="panel-body">              
<table class="table">
<thead class="thead-dark">
<tr>
<th>ID</th>
<th>NOME</th>
</tr>
</thead>
<tbody>
<?php 
foreach($viewVar['listarPerfis'] as $listar) {
?>
<tr>
<td><?php echo $listar['id']; ?></td>
<td><?php echo  $listar['nome']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>                                     

        <div class=" col-md-3"></div>
    </div>
</div>






