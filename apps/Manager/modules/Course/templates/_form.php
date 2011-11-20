<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('Course/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?cour_cd_key='.$form->getObject()->getCourCdKey() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
                <span class="back"><a class="button" href="<?php echo url_for('Course/index') ?>"></a></span>
                <span class="save"><input class="button" type="image" value="" /></span>
            </span>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['cour_nb_code']->renderLabel() ?></th>
        <td>
          <?php echo $form['cour_nb_code']->renderError() ?>
          <?php echo $form['cour_nb_code'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cour_nm_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['cour_nm_name']->renderError() ?>
          <?php echo $form['cour_nm_name'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
