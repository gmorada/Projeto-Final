<div class="row">
  <div class="span12">
    <h1 class="title">Salas<a href="<?php echo url_for('Room/new') ?>" class="btn btn-inverse" title="Cadastar"><i class="icon-plus-sign icon-white"></i> Cadastrar nova sala</a></h1>    
    <form class="well form-search form_filter" method="post" action="">
       <legend>Filtrar por prédio:</legend>
       <label>Nome do prédio:</label>
       <input type="text" class="span3 search-query" name="filter">
       <button type="submit" class="btn">Filtrar</button>
     </form>
    <table class="table table-striped tablesorter">
      <thead>
        <tr>
          <th>Prédio</th>
          <th>Número</th>
          <th>Vagas</th>
          <th></th>          
        </tr>
      </thead>
      <tbody>
          <?php foreach ($rooms as $room): ?>
          <tr>
            <td><?php echo $room->getBuilding() ?></td>
            <td><?php echo $room->getRoomNmNumber() ?></td>
            <td><?php echo $room->getRoomNbVagas() ?></td>
            <td><a class="btn btn-primary" title="Editar" href="<?php echo url_for('Room/edit?room_cd_key='.$room->getRoomCdKey()) ?>"><i class="icon-pencil icon-white"></i></a></td>
            <td><?php echo link_to('<i class="icon-trash icon-white"></i>', 'Room/delete?room_cd_key='.$room->getRoomCdKey(), array('title'=>'Deletar', 'class' => 'btn btn-danger','method' => 'delete', 'confirm' => 'Você tem certeza que deseja excluir?')) ?></td>
          </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
    </div><!--end span12-->
  </div><!--end row-->