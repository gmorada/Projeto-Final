<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="row">
  <div class="span12">
    <h1 class="title"><?php echo ($form->getObject()->isNew() ? 'Alocar novo horário': 'Editar horário')?></h1>
    <form class="form-horizontal well form_inside" action="<?php echo url_for('CrowdDatetime/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?rocd_cd_key='.$form->getObject()->getRocdCdKey() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>
      <legend><?php echo ($form->getObject()->isNew() ? 'Cadastro': 'Edição')?></legend>
      <fieldset>
        <div class="control-group">
          <label class="control-label" for="input01"><?php echo $form['rocd_nb_weekday']->renderLabelName() ?></label>
          <div class="controls">
            <?php echo $form['rocd_nb_weekday']->renderError() ?>
            <?php echo $form['rocd_nb_weekday']->render(array('class'=>'span3')) ?>            
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="input01"><?php echo $form['rocd_dt_start_time']->renderLabelName() ?></label>
          <div class="controls">
            <?php echo $form['rocd_dt_start_time']->renderError() ?>
            <?php echo $form['rocd_dt_start_time']->render(array('class'=>'span3')) ?>            
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="input01"><?php echo $form['rocd_dt_final_time']->renderLabelName() ?></label>
          <div class="controls">
            <?php echo $form['rocd_dt_final_time']->renderError() ?>
            <?php echo $form['rocd_dt_final_time']->render(array('class'=>'span3')) ?>            
          </div>
        </div>
        <div class="form-actions">
          <a class="btn" href="<?php echo url_for('CrowdDatetime/index') ?>">« Voltar</a>
          <button class="btn btn-success" type="submit">Salvar</button>
        </div>
      </fieldset>
    </form>
  </div><!--end span12-->
</div><!--end row-->