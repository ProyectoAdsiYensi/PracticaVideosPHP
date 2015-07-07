<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agregar - Usuario</title>

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
                            Agregar Usuario
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Usuarios</a>
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

                        <form role="form" id="frmUser" method="post" action="crudUser.php?action=crear">
                            <div class="form-group">
                                <label>Usuario</label>
                                <input id="usuario" name="usuario" class="form-control" placeholder="julieth">
                                <p class="help-block">Ingrese un nuevo ususario.</p>
                            </div>

                            <div class="form-group">
                                <label>Clave</label>
                                <input id="contrasena" name="contrasena" class="form-control" placeholder="******">
                                <p class="help-block">Ingrese una nueva clave.</p>
                            </div>

                            <div class="form-group">
                                <label>nombre</label>
                                <input id="nombre" name="nombre" class="form-control" placeholder="yensi julieth">
                                <p class="help-block">Digite su nombre.</p>
                            </div>

                            <div class="form-group">
                                <label>Primer apellido</label>
                                <input id="apellidouno" name="apellidouno" class="form-control" placeholder="granados">
                                <p class="help-block">Digite su primer apellido.</p>
                            </div>

                             <div class="form-group">
                                <label>Segundo apellido</label>
                                <input id="apellidodos" name="apellidodos" class="form-control" placeholder="gonzalez ">
                                <p class="help-block">Digite su segundo apellido.</p>
                             </div>

                             <div class="form-group">
                                <label>Titulo</label>
                                <input id="titulo" name="titulo" class="form-control" placeholder="mi pagina">
                                <p class="help-block">Tigite un titulo.</p>
                            </div>

                            <div class="form-group">
                                <label>Descripcion</label>
                                <input id="descripcion" name="descripcion" class="form-control" placeholder="es de tipo web  ">
                                <p class="help-block">Agrege una descripcion.</p>
                            </div>

                            <div class="form-group">
                                <label>Foto</label>
                                <input id="foto" name="foto" class="form-control" placeholder="foto">
                                <p class="help-block">Ingrese un nombre de una foto.</p>
                            </div>

                            <div class="form-group">
                                <label>Correo</label>
                                <input id="email" name="email" class="form-control" placeholder="julieth@....">
                                <p class="help-block">Digite su correo electronico.</p>
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
