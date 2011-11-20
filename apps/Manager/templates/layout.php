<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
      <div class="container">
         <?php
         if(sfContext::getInstance()->getUser()->isAuthenticated()){
         ?>
        <div class="logout"><a href="<?php echo url_for('@sf_guard_signout'); ?>">Sair</a></div>
        <div class="menu">
            <ul>
                <li>
                    <a>Cadastro</a>
                    <ul>
                        <li><a href="<?php echo url_for('Building/index'); ?>">Prédios</a></li>
                        <li><a href="<?php echo url_for('Room/index'); ?>">Salas</a></li>
                        <li><a href="<?php echo url_for('Course/index'); ?>">Cursos</a></li>
                        <li><a href="<?php echo url_for('Subject/index'); ?>">Disciplinas</a></li>
                        <li><a href="<?php echo url_for('Teacher/index'); ?>">Professores</a></li>
                        <li><a href="<?php echo url_for('Crowd/index'); ?>">Turmas</a></li>
                    </ul>
                </li>
                <li>
                    <a>Alocar</a>
                    <ul>
                        <li><a href="<?php echo url_for('CrowdDatetime/index'); ?>">Horário para turmas</a></li>
                        <li><a href="<?php echo url_for('TeacherCrowd/index'); ?>">Professor para turmas</a></li>
                        <li><a href="<?php echo url_for('RoomCrowdDatetime/index'); ?>">Sala para turmas por horário</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo url_for('Index/report'); ?>">Relatório</a></li>
            </ul>
        </div>
        <?php
        }
        ?>
        <div id="content" class="content">
            <?php if ($sf_user->hasFlash('notice')): ?>
                <div class="flashNotice"><span class="flashMessage"><?php echo $sf_user->getFlash('notice') ?></span></div>
            <?php endif ?>
            <?php echo $sf_content ?>
        </div>
        <div class="footer">
            <span>Copyright &copy; Projeto Final, all rights reserved.</span>
        </div>
    </div>
  </body>
</html>
