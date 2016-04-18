<div id="page-wrapper">

	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<h1 class="page-header">
					Editar Notícia
				</h1>
			</div>
		</div>

		<div class="row">
			<form method="post" action="<?= site_url('admin/noticias/update/'.$news->cd_news) ?>" enctype="multipart/form-data">
				<div class="col-md-9">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="form-group">
								<label for="">Título</label>
								<input type="text" class="form-control" name="title" value="<?= $news->nm_titulo ?>">
							</div>
							<div class="form-group">
								<label for="">Texto</label>
								<textarea name="description" id="description"><?= $news->ds_texto ?></textarea>
								<?php echo display_ckeditor($ckeditor_texto1); ?>
							</div>
							<div class="form-group">
								<label for="">Resumo</label>
								<textarea name="resumo" class="form-control" ><?= $news->nm_resumo ?></textarea>
							</div>
						</div>
					</div>

				</div>

				<div class="col-md-3 ">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Publicar</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label for="">Data</label>
								<input type="text" name="data" class="form-control input-sm" value="<?= date("d/m/Y H:i",strtotime($news->dt_postagem)); ?>" required="required" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4} [0-9]{2}:[0-9]{2}$">
							</div>
							<button class="btn btn-primary btn-block">Salvar Alterações</button>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Imagem destacada</h3>
						</div>
						<div class="panel-body">
							
							<?php if(!empty($news->nm_foto)): ?>
								<img src="<?= base_url() ?>/uploads/thumbs/<?= $news->nm_foto; ?>" alt="" class="img-responsive">
								<br>
							<?php endif; ?>

							<div class="form-group">
								<div class="input-group">
									<span class="input-group-btn">
										<span class="btn btn-primary btn-file">
											Browse <input type="file" name="picture">
										</span>
									</span>
									<input type="text" class="form-control" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>


	</div>
</div>


