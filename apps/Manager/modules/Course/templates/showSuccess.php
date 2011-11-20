<table>
  <tbody>
    <tr>
      <th>Cour cd key:</th>
      <td><?php echo $course->getCourCdKey() ?></td>
    </tr>
    <tr>
      <th>Cour nb code:</th>
      <td><?php echo $course->getCourNbCode() ?></td>
    </tr>
    <tr>
      <th>Cour nm name:</th>
      <td><?php echo $course->getCourNmName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('Course/edit?cour_cd_key='.$course->getCourCdKey()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('Course/index') ?>">List</a>
