<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Notícias</title>	
	<link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>/assets/css/sb-admin.css" rel="stylesheet">
	<link href="<?= base_url() ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet">
</head>
<body>
	<div id="wrapper" class="site">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="navbar-header">
				<a class="navbar-brand" href="">Notícias</a>
			</div>
		</nav>

		<div id="page-wrapper">

			<div class="container">


				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							Notícias
							<small>
								<form action="" class="form-inline pull-right search">
									<div class="form-group ">
										<label for="">Itens por página:</label>
										<input type="number" name="itens" min="1" class="form-control" style="width: 60px" value="<?= isset($_GET['itens']) ? $_GET['itens'] : $itens; ?>">
									</div>
									&nbsp;&nbsp; | &nbsp;&nbsp;
									<div class="form-group">
										<label for="">Organizar por </label>
										<select name="filter" id="" class="form-control">
											<option value=""></option>											
											<option value="data">Data</option>
											<option value="alfabetico">Alfabético</option>									
										</select>
									</div>
									&nbsp;&nbsp; | &nbsp;&nbsp;
									<div class="form-group ">
										<label for="">Procurar:</label>
										<input type="text" name="search" class="form-control" size="10" value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>">
									</div>
									&nbsp;
									<div class="form-group">
										<button class="btn btn-primary">Ir</button>
									</div>
									&nbsp;
									<div class="form-group">
										<a href="<?= site_url() ?>" class="btn btn-default">Resetar</a>
									</div>
								</form>
							</small>
						</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<br>
						<?php if($news) : ?>
							<ul class="media-list">
								<?php foreach($news as $n) : ?>
									<li class="media">
										<a href="<?= site_url().$n->nm_slug; ?>">
											<?php if(!empty($n->nm_foto)) : ?>
												<div class="media-left">
													<img class="media-object" src="<?= base_url() ?>uploads/thumbs/<?= $n->nm_foto ?>" class="img-responsive">
												</div>
											<?php endif; ?>
											<div class="media-body">
												<h4 class="media-heading"><?= $n->nm_titulo; ?></h4>
												<?= !empty($n->nm_resumo) ? $n->nm_resumo : substr(strip_tags($n->ds_texto),0,480)."..." ; ?>
											</div>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php else: ?>
							<p>Nenhum registro encontrado.</p>
						<?php endif; ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12" align="center">
					<br>
					<hr>
						<ul class="pagination">
							<?= $pagination; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="<?= base_url() ?>/assets/js/jquery.js"></script>
	<script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/jquery.mask.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/scripts.js"></script>
</body>
</html>
