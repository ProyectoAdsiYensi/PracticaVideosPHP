<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agregar - Posts</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
           
             <?php include_once "menuItems.php"; ?>
             <?php include_once "menu.php"; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Agregar Posts
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Posts</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Agregar
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form role="form" id="frmAuto" method="post" action="crudPosts.php?action=crear">
                            <div class="form-group">
                                <label>Año</label>
                                <input id="anio" name="anio" class="form-control" placeholder="2015">
                                <p class="help-block">Año</p>
                            </div>

                            <div class="form-group">
                                <label>Mes</label>
                                <input id="mes" name="mes" class="form-control" placeholder="06">
                                <p class="help-block">Mes</p>
                            </div>

                            <div class="form-group">
                                <label>Dia</label>
                                <input id="dia" name="dia" class="form-control" placeholder="15">
                                <p class="help-block">Dia</p>
                            </div>

                            <div class="form-group">
                                <label>Hora</label>
                                <input id="hora" name="hora" class="form-control" placeholder="02:30 pm">
                                <p class="help-block">Hora</p>
                            </div>

                            <div class="form-group">
                                <label>Minuto</label>
                                <input id="minuto" name="minuto" class="form-control" placeholder="11">
                                <p class="help-block">Minuto</p>
                            </div>

                            <div class="form-group">
                                <label>Segundo</label>
                                <input id="segundo" name="segundo" class="form-control" placeholder="55">
                                <p class="help-block">Segundo</p>
                            </div>

                            <div class="form-group">
                                <label>Usuario</label>
                                <input id="usuario" name="usuario" class="form-control" placeholder="julieth">
                                <p class="help-block">Usuario</p>
                            </div>

                            <div class="form-group">
                                <label>Titulo</label>
                                <input id="titulo" name="titulo" class="form-control" placeholder="post">
                                <p class="help-block">Titulo</p>
                            </div>

                            <div class="form-group">
                                <label>Subtitulo</label>
                                <input id="subtitulo" name="subtitulo" class="form-control" placeholder="primer posts">
                                <p class="help-block">Subtitulo</p>
                            </div>

                            <div class="form-group">
                                <label>Icono</label>
                                <input id="icono" name="icono" class="form-control" placeholder="icono">
                                <p class="help-block">Icono</p>
                            </div>

                            <div class="form-group">
                                <label>Texto</label>
                                <input id="texto" name="texto" class="form-control" placeholder="texto">
                                <p class="help-block">Texto</p>
                            </div>

                            <div class="form-group">
                                <label>Imagen</label>
                                <input id="imagen" name="imagen" class="form-control" placeholder="imagen">
                                <p class="help-block">Imagen</p>
                            </div>

                            <div class="form-group">
                                <label>Video</label>
                                <input id="video" name="video" class="form-control" placeholder="video">
                                <p class="help-block">Video</p>
                            </div>

                            <div class="form-group">
                                <label>Sonido</label>
                                <input id="sonido" name="sonido" class="form-control" placeholder="sonido">
                                <p class="help-block">Sonido</p>
                            </div>                     

                            <button type="submit" class="btn btn-default">Enviar</button>
                            <button type="reset" class="btn btn-default">Limpiar</button>

                        </form>

                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
