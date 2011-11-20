<table>
  <tbody>
    <tr>
      <th>Rocd cd key:</th>
      <td><?php echo $room_crowd_datetime->getRocdCdKey() ?></td>
    </tr>
    <tr>
      <th>Rcds cd key:</th>
      <td><?php echo $room_crowd_datetime->getRcdsCdKey() ?></td>
    </tr>
    <tr>
      <th>Crow cd key:</th>
      <td><?php echo $room_crowd_datetime->getCrowCdKey() ?></td>
    </tr>
    <tr>
      <th>Room cd key:</th>
      <td><?php echo $room_crowd_datetime->getRoomCdKey() ?></td>
    </tr>
    <tr>
      <th>Rocd nb weekday:</th>
      <td><?php echo $room_crowd_datetime->getRocdNbWeekday() ?></td>
    </tr>
    <tr>
      <th>Rocd dt start time:</th>
      <td><?php echo $room_crowd_datetime->getRocdDtStartTime() ?></td>
    </tr>
    <tr>
      <th>Rocd dt final time:</th>
      <td><?php echo $room_crowd_datetime->getRocdDtFinalTime() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('RoomCrowdDatetime/edit?rocd_cd_key='.$room_crowd_datetime->getRocdCdKey()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('RoomCrowdDatetime/index') ?>">List</a>
