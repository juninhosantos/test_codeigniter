<div id="page-wrapper">

	<div class="container-fluid">


		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Notícias <small>Visão Geral</small>
				</h1>
			</div>
		</div>



		<div class="row">
			<div class="col-lg-12">
				<?php if($this->session->flashdata('status')): ?>
					<div class="alert alert-success">
						<?= $this->session->flashdata('status'); ?>
					</div>
				<?php endif; ?>

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Título</th>
							<th width="50%">Resumo</th>
							<th width="15%">Data</th>
							<th width="10%"></th>
						</tr>
					</thead>
					<tbody>
						<?php if($news) : ?>
							<?php foreach($news as $n) : ?>
							<tr>
								<td><?= $n->nm_titulo; ?></td>
								<td><?= $n->nm_resumo; ?></td>
								<td><?= date("d/m/Y H:i",strtotime($n->dt_postagem)); ?></td>
								<th style="font-size: 18px">
									<a class="delete" href="<?= site_url('admin/noticias/remove/'.$n->cd_news) ?>" title="Deletar Notícias"><i class="fa fa-times"></i></a>
									&nbsp;&nbsp;&nbsp;
									<a  href="<?= site_url('admin/noticias/edit/'.$n->cd_news) ?>" title="Editar Notícia"><i class="fa fa-pencil-square-o"></i></a>
								</th>
							</tr>
						<?php endforeach; ?>
						<?php else : ?>
						<tr>
							<td colspan="3">
								Nenhum registro
							</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>


	</div>
</div>


