<?php use_helper('I18N') ?>

<form class="_login" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table id="form">
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <span><input class="largeButton" type="submit" value="<?php echo __('Conectar', null, 'sf_guard') ?>" /></span>
          
          <?php $routes = $sf_context->getRouting()->getRoutes() ?>
          <?php if (isset($routes['sf_guard_forgot_password'])): ?>
            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
          <?php endif; ?>

          <?php /*if (isset($routes['sf_guard_register'])): ?>
            <!--&nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Registar-se', null, 'sf_guard') ?></a>-->
          <?php endif; */?>
        </td>
      </tr>
    </tfoot>
  </table>
</form>