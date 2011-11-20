<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('CrowdDatetime/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?rocd_cd_key='.$form->getObject()->getRocdCdKey() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
                    <span class="back"><a class="button" href="<?php echo url_for('CrowdDatetime/index?crow_cd_key='.$form->getObject()->getCrowCdKey()) ?>"></a></span>
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
          <?php echo $crowd; ?>
        </td>
      </tr>
        <tr>
        <th><?php echo $form['rocd_nb_weekday']->renderLabel() ?></th>
        <td>
          <?php echo $form['rocd_nb_weekday']->renderError() ?>
          <?php echo $form['rocd_nb_weekday'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rocd_dt_start_time']->renderLabel() ?></th>
        <td>
          <?php echo $form['rocd_dt_start_time']->renderError() ?>
          <?php echo $form['rocd_dt_start_time'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rocd_dt_final_time']->renderLabel() ?></th>
        <td>
          <?php echo $form['rocd_dt_final_time']->renderError() ?>
          <?php echo $form['rocd_dt_final_time'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
