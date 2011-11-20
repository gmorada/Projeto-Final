<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('TeacherCrowd/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?crow_cd_key='.$form->getObject()->getCrowCdKey() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td>
          <?php echo $form->renderHiddenFields(false) ?>
        <td>
            <span class="buttons">
                <span class="back"><a class="button" href="<?php echo url_for('TeacherCrowd/index') ?>"></a></span>
                <span class="save"><input class="button" type="image" value="" /></span>
            </span>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>Disciplina</th>
        <td>
          <?php echo $crowd->getSubject(); ?>
        </td>
      </tr>
      <tr>
        <th>Turma</th>
        <td>
          <?php echo $crowd ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['teac_cd_key']->renderLabel() ?></th>
        <td>
          <?php echo $form['teac_cd_key']->renderError() ?>
          <?php echo $form['teac_cd_key'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>

