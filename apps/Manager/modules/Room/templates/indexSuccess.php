
    <h1>Salas</h1>
    <div class="filter">
        <form action="" method="post">
            <span class="filterMessage">Filtrar por Prédio: </span>
            <input type="text" name="filter"/>
            <input class="largeButton" type="submit" value="Filtrar"/>
        </form>
    </div>    
    <table class="tablesorter">
        <thead>
            <tr>
              <th>Prédio</th>
              <th>Número</th>
              <th>Vagas</th>
              <th></th>
              <th><span class="new"><a class="button" href="<?php echo url_for('Room/new') ?>"></a></span></th>
            </tr>
        </thead>
      <tbody>
        <?php foreach ($rooms as $room): ?>
        <tr>
          <td><?php echo $room->getBuilding() ?></td>
          <td><?php echo $room->getRoomNmNumber() ?></td>
          <td><?php echo $room->getRoomNbVagas() ?></td>
          <td><span class="edit"><a class="button" href="<?php echo url_for('Room/edit?room_cd_key='.$room->getRoomCdKey()) ?>"></a></span></td>
          <td><span class="delete"><?php echo link_to(' ', 'Room/delete?room_cd_key='.$room->getRoomCdKey(), array('class' => 'button','method' => 'delete', 'confirm' => 'Você tem certeza que deseja excluir?')) ?></span></td>
       </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

