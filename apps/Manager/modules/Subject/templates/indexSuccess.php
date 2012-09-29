<div class="row">
  <div class="span12">
    <h1 class="title">Disciplinas<a href="<?php echo url_for('Subject/new') ?>" class="btn btn-inverse" title="Cadastar"><i class="icon-plus-sign icon-white"></i> Cadastrar nova disciplina</a></h1>
    <form class="well form-search form_filter" method="post" action="">
       <legend>Filtrar por curso:</legend>
       <label>Nome do curso:</label>
       <input type="text" class="span3 search-query" name="filter">
       <button type="submit" class="btn">Filtrar</button>
     </form>
    <table class="table table-striped tablesorter">
      <thead>
        <tr>
          <th>Curso</th>
          <th>Código</th>
          <th>Nome</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          <?php foreach ($subjects as $subject): ?>
          <tr>
            <td><?php echo $subject->getCourse() ?></td>
            <td><?php echo $subject->getSubjNmCode() ?></td>
            <td><?php echo $subject->getSubjNmName() ?></td>
            <td><a class="btn btn-primary" title="Editar" href="<?php echo url_for('Subject/edit?subj_cd_key='.$subject->getSubjCdKey()) ?>"><i class="icon-pencil icon-white"></i></a></td>
            <td><?php echo link_to('<i class="icon-trash icon-white"></i>', 'Subject/delete?subj_cd_key='.$subject->getSubjCdKey(), array('title'=>'Deletar', 'class' => 'btn btn-danger','method' => 'delete', 'confirm' => 'Você tem certeza que deseja excluir?')) ?></td>
          </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
    </div><!--end span12-->
  </div><!--end row-->