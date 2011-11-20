<table>
  <tbody>
    <tr>
      <th>Buil cd key:</th>
      <td><?php echo $building->getBuilCdKey() ?></td>
    </tr>
    <tr>
      <th>Buil nm name:</th>
      <td><?php echo $building->getBuilNmName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('Building/edit?buil_cd_key='.$building->getBuilCdKey()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('Building/index') ?>">Listar Prédios</a>
