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
     <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Sistema de Controle de Salas</a>
            <?php
            if(sfContext::getInstance()->getUser()->isAuthenticated()){
            ?>
              <div class="nav-collapse">
                <ul class="nav">
                  <li class="active"><a href="<?php echo url_for('Index/index'); ?>">Página inicial</a></li>
                  <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Cadastro <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo url_for('Building/index'); ?>">Prédios</a></li>
                      <li><a href="<?php echo url_for('Room/index'); ?>">Salas</a></li>
                      <li><a href="<?php echo url_for('Course/index'); ?>">Cursos</a></li>
                      <li><a href="<?php echo url_for('Subject/index'); ?>">Disciplinas</a></li>
                      <li><a href="<?php echo url_for('Crowd/index'); ?>">Turmas</a></li>
                      <li><a href="<?php echo url_for('Teacher/index'); ?>">Professores</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Alocação <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo url_for('CrowdDatetime/index'); ?>">Horário para turmas</a></li>
                      <li><a href="<?php echo url_for('TeacherCrowd/index'); ?>">Professor para turmas</a></li>
                      <li><a href="<?php echo url_for('RoomCrowdDatetime/index'); ?>">Sala para turmas (por horário)</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo url_for('Index/report'); ?>">Relatório</a></li>
                </ul>
                <ul class="nav pull-right">
                  <li><a href="<?php echo url_for('@sf_guard_signout'); ?>">Sair</a></li>
                </ul>
              </div>
            <?php
            }
            ?>
        </div>
      </div>
    </div><!--end navbar-->
    <div class="container">
        <?php
        if(sfContext::getInstance()->getUser()->isAuthenticated()){
        ?>
            <div id="content" class="content">
                <?php if ($sf_user->hasFlash('notice')): ?>
                    <div class="flashNotice"><span class="flashMessage"><?php echo $sf_user->getFlash('notice') ?></span></div>
                <?php endif ?>
            </div>
        <?php
        }
        ?>
        <?php echo $sf_content ?>
    </div>
    <footer class="navbar-fixed-bottom">
      <hr>
      <div class="row">
        <div class="span4 offset5">
          <p>Copyright 2012 &copy; Projeto Final, all rights reserved.</p>
        </div><!--end span12-->
      </div><!--end row-->
    </footer>
  </body>
</html>
