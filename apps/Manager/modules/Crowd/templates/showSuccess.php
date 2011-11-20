<table>
  <tbody>
    <tr>
      <th>Crow cd key:</th>
      <td><?php echo $crowd->getCrowCdKey() ?></td>
    </tr>
    <tr>
      <th>Time cd key:</th>
      <td><?php echo $crowd->getTimeCdKey() ?></td>
    </tr>
    <tr>
      <th>Subj cd key:</th>
      <td><?php echo $crowd->getSubjCdKey() ?></td>
    </tr>
    <tr>
      <th>Teac cd key:</th>
      <td><?php echo $crowd->getTeacCdKey() ?></td>
    </tr>
    <tr>
      <th>Crow nm name:</th>
      <td><?php echo $crowd->getCrowNmName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('Crowd/edit?crow_cd_key='.$crowd->getCrowCdKey()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('Crowd/index') ?>">Listar Turmas</a>
