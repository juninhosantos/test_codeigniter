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
							<?= $news->nm_titulo; ?>
						</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<small><i>Publicado em <?= date("d/m/Y H:i",strtotime($news->dt_postagem)); ?></i></small>
						<br><br>
						<?= $news->ds_texto; ?>
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
