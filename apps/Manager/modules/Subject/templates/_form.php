<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="row">
  <div class="span12">
    <h1 class="title"><?php echo ($form->getObject()->isNew() ? 'Cadastrar nova disciplina': 'Editar disciplina')?></h1>
    <form class="form-horizontal well form_inside" action="<?php echo url_for('Subject/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?subj_cd_key='.$form->getObject()->getSubjCdKey() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>
      <legend><?php echo ($form->getObject()->isNew() ? 'Cadastro': 'Edição')?></legend>
      <fieldset>
        <div class="control-group">
          <label class="control-label" for="input01"><?php echo $form['cour_cd_key']->renderLabelName() ?></label>
          <div class="controls">
            <?php echo $form['cour_cd_key']->renderError() ?>
            <?php echo $form['cour_cd_key']->render(array('class'=>'span3')) ?>            
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="input01"><?php echo $form['subj_nm_code']->renderLabelName() ?></label>
          <div class="controls">
            <?php echo $form['subj_nm_code']->renderError() ?>
            <?php echo $form['subj_nm_code']->render(array('class'=>'span3')) ?>            
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="input01"><?php echo $form['subj_nm_name']->renderLabelName() ?></label>
          <div class="controls">
            <?php echo $form['subj_nm_name']->renderError() ?>
            <?php echo $form['subj_nm_name']->render(array('class'=>'span3')) ?>            
          </div>
        </div>
        <div class="form-actions">
          <a class="btn" href="<?php echo url_for('Subject/index') ?>">« Voltar</a>
          <button class="btn btn-success" type="submit">Salvar</button>
        </div>
      </fieldset>
    </form>
  </div><!--end span12-->
</div><!--end row-->