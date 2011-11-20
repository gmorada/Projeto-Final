<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('RoomCrowdDatetime/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?rocd_cd_key='.$form->getObject()->getRocdCdKey() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
                    <span class="back"><a class="button" href="<?php echo url_for('RoomCrowdDatetime/index?crow_cd_key='.$form->getObject()->getCrowCdKey()) ?>"></a></span>
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
          <?php echo $roomCrowdDatetime->Crowd->getSubject(); ?>
        </td>
      </tr>
      <tr>
        <th>Turma</th>
        <td>
          <?php echo $roomCrowdDatetime->Crowd; ?>
        </td>
      </tr>
      <tr>
        <th>Horário</th>
        <td>
          <?php echo $roomCrowdDatetime->getWeekday().": ".$roomCrowdDatetime->getTimetable(); ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['room_cd_key']->renderLabel() ?></th>
        <td>
          <?php echo $form['room_cd_key']->renderError() ?>
          <?php echo $form['room_cd_key'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
