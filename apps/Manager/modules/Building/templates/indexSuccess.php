
    <h1>Prédios</h1>
    <table class="tablesorter">
        <thead>
            <tr>
                <th>Nome</th>
                <th></th>
                <th><span class="new"><a class="button" href="<?php echo url_for('Building/new') ?>"></a></span></th>
              </tr>
        </thead>
      <tbody>
          <?php foreach ($buildings as $building): ?>
          <tr>
            <td><?php echo $building->getBuilNmName() ?></td>
            <td><span class="edit"><a class="button" href="<?php echo url_for('Building/edit?buil_cd_key='.$building->getBuilCdKey()) ?>"></a></span></td>
            <td><span class="delete"><?php echo link_to(' ', 'Building/delete?buil_cd_key='.$building->getBuilCdKey(), array('class' => 'button','method' => 'delete', 'confirm' => 'Você tem certeza que deseja excluir?')) ?></span></td>
          </tr>
          <?php endforeach; ?>
      </tbody>
    </table>

