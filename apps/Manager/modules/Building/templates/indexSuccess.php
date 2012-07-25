<div class="row">
  <div class="span12">
    <h1 class="title">Prédios<a href="<?php echo url_for('Building/new') ?>" class="btn btn-inverse" title="Cadastar"><i class="icon-plus-sign icon-white"></i> Cadastrar novo prédio</a></h1>    
    <table class="table table-striped tablesorter">
      <thead>
        <tr>
          <th>Nome</th>
          <th></th>          
        </tr>
      </thead>
      <tbody>
          <?php foreach ($buildings as $building): ?>
          <tr>
            <td><?php echo $building->getBuilNmName() ?></td>
            <td><a class="btn btn-primary" title="Editar" href="<?php echo url_for('Building/edit?buil_cd_key='.$building->getBuilCdKey()) ?>"><i class="icon-pencil icon-white"></i></a></td>
            <td><?php echo link_to('<i class="icon-trash icon-white"></i>', 'Building/delete?buil_cd_key='.$building->getBuilCdKey(), array('title'=>'Deletar', 'class' => 'btn btn-danger','method' => 'delete', 'confirm' => 'Você tem certeza que deseja excluir?')) ?></td>
          </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
    </div><!--end span12-->
  </div><!--end row-->