<table>
  <tbody>
    <tr>
      <th>Subj cd key:</th>
      <td><?php echo $subject->getSubjCdKey() ?></td>
    </tr>
    <tr>
      <th>Subj nm name:</th>
      <td><?php echo $subject->getSubjNmName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('Subject/edit?subj_cd_key='.$subject->getSubjCdKey()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('Subject/index') ?>">List</a>
