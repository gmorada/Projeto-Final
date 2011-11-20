<table>
  <tbody>
    <tr>
      <th>Room cd key:</th>
      <td><?php echo $room->getRoomCdKey() ?></td>
    </tr>
    <tr>
      <th>Buil cd key:</th>
      <td><?php echo $room->getBuilCdKey() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('Room/edit?room_cd_key='.$room->getRoomCdKey()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('Room/index') ?>">List</a>
