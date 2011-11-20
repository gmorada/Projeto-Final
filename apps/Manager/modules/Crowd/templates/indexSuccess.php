
    <h1>Turmas</h1>
    <div class="filter">
        <form action="" method="post">
            <span class="filterMessage">Filtrar por Disciplina: </span>
            <input type="text" name="filter"/>
            <input class="largeButton" type="submit" value="Filtrar"/>
        </form>
    </div>    
    <table class="tablesorter">
        <thead>
            <tr>
              <th>Código</th>
              <th>Disciplina</th>
              <th>Turma</th>
              <th>Modulo</th>
              <th></th>
              <th></th>
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
                  <td colspan="6"><?php echo $subject ?></td>
                  <td><span class="new"><a class="button" href="<?php echo url_for('Crowd/new?subj_cd_key='.$subject->getSubjCdKey()) ?>"></a></span></td>
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
                  <td><span class="edit"><a class="button" href="<?php echo url_for('Crowd/edit?crow_cd_key='.$crowd->getCrowCdKey()) ?>"></a></span></td>
                  <td><span class="delete"><?php echo link_to(' ', 'Crowd/delete?crow_cd_key='.$crowd->getCrowCdKey(), array('class' => 'button','method' => 'delete', 'confirm' => 'Você tem certeza que deseja excluir?')) ?></span></td>
                  <td><span class="new"><a class="button" href="<?php echo url_for('Crowd/new?subj_cd_key='.$subject->getSubjCdKey()) ?>"></a></span></td>
                </tr>
            <?php } ?>
        <?php } ?>
      </tbody>
    </table>

