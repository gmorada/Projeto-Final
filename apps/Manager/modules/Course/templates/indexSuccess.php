<div class="row">
  <div class="span12">
    <h1 class="title">Cursos<a href="<?php echo url_for('Course/new') ?>" class="btn btn-inverse" title="Cadastar"><i class="icon-plus-sign icon-white"></i> Cadastrar novo curso</a></h1>
    <table class="table table-striped tablesorter">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Código</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          <?php foreach ($courses as $course): ?>
          <tr>
            <td><?php echo $course->getCourNmName() ?></td>
            <td><?php echo $course->getCourNbCode() ?></td>
            <td><a class="btn btn-primary" title="Editar" href="<?php echo url_for('Course/edit?cour_cd_key='.$course->getCourCdKey()) ?>"><i class="icon-pencil icon-white"></i></a></td>
            <td><?php echo link_to('<i class="icon-trash icon-white"></i>', 'Course/delete?cour_cd_key='.$course->getCourCdKey(), array('title'=>'Deletar', 'class' => 'btn btn-danger','method' => 'delete', 'confirm' => 'Você tem certeza que deseja excluir?')) ?></td>
          </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
    </div><!--end span12-->
  </div><!--end row-->