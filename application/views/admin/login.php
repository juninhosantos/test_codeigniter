<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Adm Noticias</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= base_url() ?>/assets/css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url() ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper" style="padding:0">
            <div class="container">
                <div class="col-md-4 col-md-offset-4 col-xs-10 ">
                    <br>                    
                    <br />
                    <div class="panel panel-primary">
                        <form method="post" class="form-signin" role="form" action="<?= site_url('admin/login/auth') ?>">
                            <div class="panel-body">
                                <p>
                                    <input name="login" type="text" class="form-control input-lg" placeholder="Login" required="" autofocus="" contenteditable="false" value="<?= isset($_POST['login']) ? $_POST['login'] : ''; ?>">
                                </p>
                                <p>
                                    <input name="senha" type="password" class="form-control input-lg" placeholder="Senha" required="" contenteditable="false">
                                </p>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                            </div>
                            
                            <?php if($this->session->flashdata('erro')) : ?>
                                <br><br>    
                                <div class="alert alert-danger">
                                    <?= $this->session->flashdata('erro') ?>
                                </div>
                            <?php endif; ?>
                        </form>                
                    </div>
                </div>
            </div>
        </div><!-- /#wrapper -->

        <!-- jQuery -->
        <script src="<?= base_url() ?>/assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>

    </body>

</html>

