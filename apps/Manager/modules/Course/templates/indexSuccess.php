
    <h1>Cursos</h1>
    <table class="tablesorter">
      <thead>
          <tr>
            <th>Nome</th>
            <th>Código</th>
            <th></th>
            <th><span class="new"><a class="button" href="<?php echo url_for('Course/new') ?>"></a></span></th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($courses as $course): ?>
          <tr>
            <td><?php echo $course->getCourNmName() ?></td>
            <td><?php echo $course->getCourNbCode() ?></td>
            <td><span class="edit"><a class="button" href="<?php echo url_for('Course/edit?cour_cd_key='.$course->getCourCdKey()) ?>"></a></span></td>
            <td><span class="delete"><?php echo link_to(' ', 'Course/delete?cour_cd_key='.$course->getCourCdKey(), array('class' => 'button','method' => 'delete', 'confirm' => 'Você tem certeza que deseja excluir?')) ?></span></td>
          </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
