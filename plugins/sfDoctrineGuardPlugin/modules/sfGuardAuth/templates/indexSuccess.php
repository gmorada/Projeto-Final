<h1>Users List</h1>

<table>
  <thead>
    <tr>
      <th>id</th>
      <th>username</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
      <td><a href="<?php //echo url_for('Building/show?buil_cd_key='.$building->getBuilCdKey()) ?>"><?php echo $user->getId() ?></a></td>
      <td><?php echo $user->getUsername() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('@sf_guard_register') ?>">New</a>
