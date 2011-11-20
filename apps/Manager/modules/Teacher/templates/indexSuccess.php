
    <h1>Professores</h1>
    <table class="tablesorter">
        <thead>
            <tr>
              <th>Nome</th>
              <!--<th>Email</th>-->
              <th></th>
              <th><span class="new"><a class="button" href="<?php echo url_for('Teacher/new') ?>"></a></span></th>
            </tr>
        </thead>
      <tbody>
        <?php foreach ($teachers as $teacher): ?>
        <tr>
            <td><?php echo $teacher->getTeacNmName() ?></td>
            <!--<td><?php //echo $teacher->getTeacNmEmail() ?></td>-->
            <td><span class="edit"><a class="button" href="<?php echo url_for('Teacher/edit?teac_cd_key='.$teacher->getTeacCdKey()) ?>"></a></span></td>
          <td><span class="delete"><?php echo link_to(' ', 'Teacher/delete?teac_cd_key='.$teacher->getTeacCdKey(), array('class' => 'button','method' => 'delete', 'confirm' => 'Você tem certeza que deseja excluir?')) ?></span></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>