<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('Subject/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?subj_cd_key='.$form->getObject()->getSubjCdKey() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
                    <span class="back"><a class="button" href="<?php echo url_for('Subject/index') ?>"></a></span>
                    <span class="save"><input class="button" type="image" value="" /></span>
                </span>
            </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
        <tr>
            <th><?php echo $form['cour_cd_key']->renderLabel() ?></th>
                <td>
                    <?php echo $form['cour_cd_key']->renderError() ?>
                    <?php echo $form['cour_cd_key'] ?>
                </td>
        </tr>
        <tr>
            <th><?php echo $form['subj_nm_code']->renderLabel() ?></th>
                <td>
                  <?php echo $form['subj_nm_code']->renderError() ?>
                  <?php echo $form['subj_nm_code'] ?>
                </td>
          </tr>
        <tr>
        <th><?php echo $form['subj_nm_name']->renderLabel() ?></th>
            <td>
                <?php echo $form['subj_nm_name']->renderError() ?>
                <?php echo $form['subj_nm_name'] ?>
            </td>
        </tr>
    </tbody>
  </table>
</form>
