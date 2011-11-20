
    <h1>Disciplinas</h1>
    <div class="filter">
        <form action="" method="post">
            <span class="filterMessage">Filtrar por Curso: </span>
            <input type="text" name="filter"/>
            <input class="largeButton" type="submit" value="Filtrar"/>
        </form>
    </div>
    <table class="tablesorter">
        <thead>
            <tr>
              <th>Curso</th>
              <th>Código</th>
              <th>Nome</th>
              <th></th>
              <th><span class="new"><a class="button" href="<?php echo url_for('Subject/new') ?>"></a></span></th>
            </tr>
        </thead>
      <tbody>
        <?php foreach ($subjects as $subject): ?>
        <tr>
          <td><?php echo $subject->getCourse() ?></td>
          <td><?php echo $subject->getSubjNmCode() ?></td>
          <td><?php echo $subject->getSubjNmName() ?></td>
          <td><span class="edit"><a class="button" href="<?php echo url_for('Subject/edit?subj_cd_key='.$subject->getSubjCdKey()) ?>"></a></span></td>
          <td><span class="delete"><?php echo link_to(' ', 'Subject/delete?subj_cd_key='.$subject->getSubjCdKey(), array('class' => 'button','method' => 'delete', 'confirm' => 'Você tem certeza que deseja excluir?')) ?></span></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>