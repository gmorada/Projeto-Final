<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('Room/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?room_cd_key='.$form->getObject()->getRoomCdKey() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
                    <span class="back"><a class="button" href="<?php echo url_for('Room/index') ?>"></a></span>
                    <span class="save"><input class="button" type="image" value="" /></span>
                </span>
            </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['buil_cd_key']->renderLabel() ?></th>
        <td>
          <?php echo $form['buil_cd_key']->renderError() ?>
          <?php echo $form['buil_cd_key'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['room_nm_number']->renderLabel() ?></th>
        <td>
          <?php echo $form['room_nm_number']->renderError() ?>
          <?php echo $form['room_nm_number'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['room_nb_vagas']->renderLabel() ?></th>
        <td>
          <?php echo $form['room_nb_vagas']->renderError() ?>
          <?php echo $form['room_nb_vagas'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
