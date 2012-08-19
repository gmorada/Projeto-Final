<div class="row">
  <div class="span12">
    <form class="well form-search form_filter" method="post" action="">
        <legend>Filtrar por disciplina:</legend>
        <label>Nome da disciplina:</label>
        <input type="text" class="span3 search-query" name="filter">
        <button type="submit" class="btn">Filtrar</button>
    </form>
    <table class="table table-striped tablesorter">
      <thead>
        <tr>
          <th>Código</th>
          <th>Disciplina</th>
          <th>Turma</th>
          <th>Modulo</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php
           foreach ($subjects as $subject){
            $crowds = Doctrine::getTable('Crowd')->findBySubjCdKey($subject->getSubjCdKey());
            if(!count($crowds)){
        ?>
                <tr>
                  <td></td>
                  <td colspan="1"><?php echo $subject ?></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><a href="<?php echo url_for('Crowd/new?subj_cd_key='.$subject->getSubjCdKey()) ?>" class="btn btn-success" title="Alocar"><i class="icon-plus icon-white"></i> </a></td>
                </tr>
        <?php
            }
            foreach ($crowds as $crowd){
        ?>
          <tr>
            <td><?php echo $crowd->Subject->getSubjNmCode() ?></td>
            <td><?php echo $crowd->getSubject() ?></td>
            <td><?php echo $crowd->getCrowNmName() ?></td>
            <td><?php echo $crowd->getCrowNbModule() ?></td>
            <td><a class="btn btn-primary" title="Editar" href="<?php echo url_for('Crowd/edit?crow_cd_key='.$crowd->getCrowCdKey()) ?>"><i class="icon-pencil icon-white"></i></a></td>
            <td><?php echo link_to('<i class="icon-trash icon-white"></i>', 'Crowd/edit?crow_cd_key='.$crowd->getCrowCdKey(), array('title'=>'Deletar', 'class' => 'btn btn-danger','method' => 'delete', 'confirm' => 'Você tem certeza que deseja excluir?')) ?></td>
          </tr>
            <?php } ?>
        <?php } ?>
      </tbody>
    </table>
    </div><!--end span12-->
  </div><!--end row-->