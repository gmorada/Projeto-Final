<div class="row">
    <div class="span12">
      <h1 class="title">Alocar Sala para Turmas</h1>
      <table class="table table-striped tablesorter">
        <thead>
          <tr>
            <th>Código</th>
            <th>Disciplina</th>
            <th>Turma</th>
            <th>Modulo</th>
            <th>Dia da Semana</th>
            <th>Horário de Inicio</th>
            <th>Horário de Término</th>
            <th>Sala</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
         <?php foreach ($crowds as $crowd):
            $room_crowd_datetimes = Doctrine::getTable('RoomCrowdDatetime')->findByCrowCdKey($crowd->getCrowCdKey());
            if(count($room_crowd_datetimes)){
        ?>
        <?php
              foreach ($room_crowd_datetimes as $room_crowd_datetime):
        ?>
              <tr>
     <!--            <td><?php echo $room_crowd_datetime->getRoomCrowdDatetimeStatus() ?></td>  -->
                <td><?php echo $crowd->Subject->getSubjNmCode() ?></td>
                <td><?php echo $crowd->getSubject() ?></td>
                <td><?php echo $crowd->getCrowNmName() ?></td>
                <td><?php echo $crowd->getCrowNbModule() ?></td>
                <td><?php echo $room_crowd_datetime->getWeekday() ?></td>
                <td><?php echo $room_crowd_datetime->getRocdDtStartTime() ?></td>
                <td><?php echo $room_crowd_datetime->getRocdDtFinalTime() ?></td>
                <?php
                    if($room_crowd_datetime->getRoomCdKey())
                    {
                    ?>
                        <td><?php echo $room_crowd_datetime->getRoom(); ?></td>
                        <td><a href="<?php echo url_for('RoomCrowdDatetime/edit?rocd_cd_key='.$room_crowd_datetime->getRocdCdKey()) ?>" class="btn btn-primary" title="Editar"><i class="icon-pencil icon-white"></i></a></td>
                        <td><?php echo link_to('<i class="icon-trash icon-white"></i>', 'RoomCrowdDatetime/delete?rocd_cd_key='.$room_crowd_datetime->getRocdCdKey(), array('title' => 'Deletar', 'class' => 'btn btn-danger','method' => 'delete', 'confirm' => 'Você tem certeza que deseja excluir?')) ?></td>
                    <?php
                    }
                    else
                    {
                    ?>
                        <td></td>
                        <td></td>
                        <td><a href="<?php echo url_for('RoomCrowdDatetime/new?rocd_cd_key='.$room_crowd_datetime->getRocdCdKey()) ?>" class="btn btn-success" title="Alocar"><i class="icon-plus icon-white"></i> </a></td>
                    <?php
                    }
                ?>
              </tr>
              <?php endforeach; }?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div><!--end span12-->
</div><!--end row-->