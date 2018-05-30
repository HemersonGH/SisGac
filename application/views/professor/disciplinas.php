<link href="<?= base_url(); ?>assets/css/disciplina_professor.css" rel="stylesheet">

<main class="row col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3 main">
  <div class="col-md-10">
    <h1 class="page-header"> Disciplinas </h1>
  </div>

  <div class="col-md-2">
    <a class="btn btn-primary btn-block" href="<?= base_url(); ?>professor/criar_disciplina">
      <span class="fa fa-plus-square" aria-hidden="true"></span> Criar Disciplina
    </a>
  </div>

  <!-- <div class="col-md-12" style="padding-bottom: 10px">
  <form action="usuario/pesquisar" method="post">
  <div class="row">
  <div class="col-md-10">
  <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Pesquisar...">
</div>
<div class="col-md-2">
<button type="submit" class="btn btn-success btn-block">Pesquisar</button>
</div>
</div>
</form>
</div> -->

<div class="padding col-md-12">
  <h5> Minhas Disciplinas </h5>
  <table class="table table-striped paddingTable">
    <tr>
      <th> Código da Disciplina </th>
      <th> Disciplina </th>
      <th> Nº de Conjuntos </th>
      <th> Status </th>
      <th> Ações </th>
    </tr>
    <?php foreach ($disciplinas as $disciplina) { ?>
      <tr>
        <td> <?= $disciplina->codigo_disciplina; ?> </td>
        <td> <?= $disciplina->nome_disciplina; ?> </td>
        <td> <?= $this->load->library('application/controllers/professor')->professor->get_Qtd_Conjunto_Atividades($disciplina->idDisciplina); ?> </td>
        <td> <?= $disciplina->status == null ? 'Em Andamento':($disciplina->status == 1 ? 'Disponível':'Finalizada'); ?> </td>
        <td>
          <?php if ($disciplina->status == null): ?>
            <a title="Adicionar conjuntos de atividades para a disciplina" href="<?= base_url('professor/adicionar_conjunto_atividade/'.$disciplina->idDisciplina); ?>">
              <span class="fa fa-folder folder mr-2" aria-hidden="true"></span>
            </a>
          <?php else: ?>
            <a title="Não é possível adicionar conjunto de atividades pois a disciplina está disponível" href="<?= base_url('professor/adicionar_iteracao/'.$disciplina->idDisciplina); ?>">
              <span class="fa fa-folder mr-2 color_disabled" aria-hidden="true"></span>
            </a>
          <?php endif; ?>

          <?php if ($disciplina->status == null): ?>
            <a title="Editar disciplina" href="<?= base_url('professor/atualizar_disciplina/'.$disciplina->idDisciplina); ?>">
              <span class="fa fa-pencil pencil mr-2" aria-hidden="true"></span>
            </a>
          <?php else: ?>
            <a title="Edição bloqueada">
              <span class="fa fa-pencil color_disabled mr-2" aria-hidden="true"></span>
            </a>
          <?php endif; ?>
          <!--  " -->
          <a href="<?= base_url('professor/excluir_disciplina/'.$disciplina->idDisciplina); ?>" onclick="return confirm('Deseja realmente remover essa disciplina?');">
            <span class="fa fa-remove remove mr-2 cursor" title="Excluir disciplina" aria-hidden="true"></span>
          </a>
        </td>
      </tr>
    <?php } ?>
</table>
</div>
</main>
</div>
</div>
