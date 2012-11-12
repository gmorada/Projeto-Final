<div class="row">
    <div class="span12">
      <h1 class="title">Alocar horários para turmas</h1>
      <table class="table table-striped tablesorter">
        <thead>
          <tr>
            <th>Código</th>
            <th>Disciplina</th>
            <th>Turma</th>
            <th>Módulo</th>
            <th>Dia da semana</th>
            <th>Horário de inicio</th>
            <th>Horário de término</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($crowds as $crowd):
            $room_crowd_datetimes = Doctrine::getTable('RoomCrowdDatetime')->findByCrowCdKey($crowd->getCrowCdKey());
            $parent = Doctrine::getTable('Crowd')->findOneByCrowCdParent($crowd->getCrowCdKey());
            if(!count($room_crowd_datetimes)){
        ?>
                <tr>
                    <td><?php echo $crowd->Subject->getSubjNmCode() ?></td>
                    <td><?php echo $crowd->getSubject() ?></td>
                    <td><?php echo $crowd->getCrowNmName() ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php
                        if(!$parent)
                        {
                        ?>
                            <a href="<?php echo url_for('CrowdDatetime/new?crow_cd_key='.$crowd->getCrowCdKey()) ?>" class="btn btn-success" title="Alocar"><i class="icon-plus icon-white"></i> </a>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
        <?php
            }
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
                <td><a href="<?php echo url_for('CrowdDatetime/edit?rocd_cd_key='.$room_crowd_datetime->getRocdCdKey()) ?>" class="btn btn-primary" title="Editar"><i class="icon-pencil icon-white"></i></a></td>

                <!-- <a href="#" class="btn btn-danger" title="Deletar"></a> -->
                <td><?php echo link_to('<i class="icon-trash icon-white"></i>', 'CrowdDatetime/delete?rocd_cd_key='.$room_crowd_datetime->getRocdCdKey(), array('title' => 'Deletar', 'class' => 'btn btn-danger','method' => 'delete', 'confirm' => 'Você tem certeza que deseja excluir?')) ?></td>
                <td><a href="<?php echo url_for('CrowdDatetime/new?crow_cd_key='.$crowd->getCrowCdKey()) ?>" class="btn btn-success" title="Alocar"><i class="icon-plus icon-white"></i> </a></td>
              </tr>
              <?php endforeach; ?>
          <?php endforeach; ?>          
        </tbody>
      </table>
    </div><!--end span12-->
</div><!--end row-->