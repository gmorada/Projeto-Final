<?php use_helper('I18N') ?>
<div class="row">
  <div class="span4 offset4 form_login">
    <form class="_login well" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
      <?php echo $form->renderHiddenFields(true) ?>
      <?php echo $form->renderGlobalErrors() ?>          
      <div class="control-group">
        <a class="btn btn-success pull-right" href="<?php echo url_for('Index/report'); ?>">Quadro de horários</a>
      </div>
      <fieldset>
        <legend>Login</legend>
        <div class="control-group">
          <label class="control-label" for="signin_username">Usuário ou Email:</label>
          <div class="controls">
            <input type="text" class="span3" name="signin[username]" id="signin_username">
            <?php echo $form['username']->renderError() ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="signin_password">Senha:</label>
          <div class="controls">
            <input type="password" class="span3" name="signin[password]" id="signin_password">
            <?php echo $form['password']->renderError() ?>
          </div>
        </div>
        <div class="control-group">
          <label class="checkbox">
            <input type="checkbox" name="signin[remember]" id="signin_remember">
            Permanecer conectado
          </label>
        </div>

        <div class="form-actions">
          <button class="btn btn-success span3" type="submit"><?php echo __('Conectar', null, 'sf_guard') ?></button>
        </div>
      </fieldset>
    </form>
  </div><!--end span12-->
</div>