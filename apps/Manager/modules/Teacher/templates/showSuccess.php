<table>
  <tbody>
    <tr>
      <th>Teac cd key:</th>
      <td><?php echo $teacher->getTeacCdKey() ?></td>
    </tr>
    <tr>
      <th>Teac nm name:</th>
      <td><?php echo $teacher->getTeacNmName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('Teacher/edit?teac_cd_key='.$teacher->getTeacCdKey()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('Teacher/index') ?>">List</a>
