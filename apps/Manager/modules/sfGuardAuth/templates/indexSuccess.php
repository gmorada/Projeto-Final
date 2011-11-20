
    <h1>Usuários</h1>
    
      <tbody>
        <tr>
          <th>id</th>
          <th>username</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
          <td><a href="<?php //echo url_for('Building/show?buil_cd_key='.$building->getBuilCdKey()) ?>"><?php echo $user->getId() ?></a></td>
          <td><?php echo $user->getUsername() ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <span><a class="button" href="<?php echo url_for('@sf_guard_register') ?>">Novo Usuário</a></span>

