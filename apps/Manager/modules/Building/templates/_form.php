<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<div class="row">
  <div class="span12">
    <h1 class="title"><?php echo ($form->getObject()->isNew() ? 'Cadastrar novo prédio': 'Editar prédio')?></h1>
    <form class="form-horizontal well form_inside" action="<?php echo url_for('Building/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?buil_cd_key='.$form->getObject()->getBuilCdKey() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>
      <legend><?php echo ($form->getObject()->isNew() ? 'Cadastro': 'Edição')?></legend>
      <fieldset>
        <div class="control-group">
          <label class="control-label" for="input01"><?php echo $form['buil_nm_name']->renderLabelName() ?></label>
          <div class="controls">
            <?php echo $form['buil_nm_name']->renderError() ?>
            <?php echo $form['buil_nm_name']->render(array('class'=>'span3')) ?>            
          </div>
        </div>
        <div class="form-actions">
          <a class="btn" href="<?php echo url_for('Building/index') ?>">« Voltar</a>
          <button class="btn btn-success" type="submit">Salvar</button>
        </div>
      </fieldset>
    </form>
  </div><!--end span12-->
</div><!--end row-->