<div class="row">
  <div class="span12">
    <h1 class="title">Professores<a href="<?php echo url_for('Teacher/new') ?>" class="btn btn-inverse" title="Cadastar"><i class="icon-plus-sign icon-white"></i> Cadastrar novo professor</a></h1>
    <table class="table table-striped tablesorter">
      <thead>
        <tr>
          <th>Nome</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          <?php foreach ($teachers as $teacher): ?>
          <tr>
            <td><?php echo $teacher->getTeacNmName() ?></td>
            <td><a class="btn btn-primary" title="Editar" href="<?php echo url_for('Teacher/edit?teac_cd_key='.$teacher->getTeacCdKey()) ?>"><i class="icon-pencil icon-white"></i></a></td>
            <td><?php echo link_to('<i class="icon-trash icon-white"></i>', 'Teacher/delete?teac_cd_key='.$teacher->getTeacCdKey(), array('title'=>'Deletar', 'class' => 'btn btn-danger','method' => 'delete', 'confirm' => 'Você tem certeza que deseja excluir?')) ?></td>
          </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
    </div><!--end span12-->
  </div><!--end row-->