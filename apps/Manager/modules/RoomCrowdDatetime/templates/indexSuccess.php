
    <h1>Alocar Sala para Turmas</h1>
    <table class="tablesorter">
        <thead>
            <tr>
 <!--           <th>Status</th> -->
                <th>Código</th>
                <th>Disciplina</th>
                <th>Turma</th>
                <th>Modulo</th>
                <th>Dia da Semana</th>
                <th>Horário de Inicio</th>
                <th>Horário de Término</th>
                <th>Sala</th>
                <th></th>
                <th></th><!--
                <th><span class="back"><a class="button" href="<?php// echo url_for('Crowd/index') ?>">Voltar</a></span></th>
                <th><span class="new"><a class="button" href="<?php// echo url_for('RoomCrowdDatetime/new?crow_cd_key='.$crowCdKey) ?>">Alocar Turma</a></span></th>
-->
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
                        <td><span class="edit"><a class="button" href="<?php echo url_for('RoomCrowdDatetime/edit?rocd_cd_key='.$room_crowd_datetime->getRocdCdKey()) ?>"></a></span></td>
                        <td><span class="delete"><?php echo link_to(' ', 'RoomCrowdDatetime/delete?rocd_cd_key='.$room_crowd_datetime->getRocdCdKey(), array('class' => 'button','method' => 'delete', 'confirm' => 'Você tem certeza que deseja desalocar essa sala?')) ?></span></td>
                    <?php
                    }
                    else
                    {
                    ?>
                        <td></td>
                        <td></td>
                        <td><span class="new"><a class="button" href="<?php echo url_for('RoomCrowdDatetime/new?rocd_cd_key='.$room_crowd_datetime->getRocdCdKey()) ?>"></a></span></td>
                    <?php
                    }
                ?>
              </tr>
              <?php endforeach; }?>
          <?php endforeach; ?>
      </tbody>
    </table>