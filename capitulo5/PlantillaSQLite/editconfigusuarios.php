<?php
require_once "crudConfigUsuaurio.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar - Configusuarios</title>

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
                            Editar Configuracion de Usuarios
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Automoviles</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Editar
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <?php if(empty($_GET['id'])){ ?>
                    <div class="alert alert-danger">
                        <strong>Error!</strong> No se encontro un automovil al que aplicar esta accion.
                    </div>
                <?php }else{ ?>

                <?php
                    $_SESSION['idconfigusuarios'] = $_GET['id'];
                    $arrconfigusuarios = getconfigusuarios($_SESSION['idconfigusuarios']);
                ?>
                <div class="row">
                    <div class="col-lg-8">

                        <form role="form" id="frmConfig" method="post" action="crudConfigUsuaurio.php?action=update">
                            <div class="form-group">
                                <label>Usuario</label>
                                <input id="usuario" name="usuario" class="form-control" value="<?php echo $arrconfigusuarios['usuario']; ?>" placeholder="Nombre de Usuario">
                                <p class="help-block">Nombre Completo del Usuario.</p>
                            </div>

                            <div class="form-group">
                                <label>Piel</label>
                                <input id="piel" name="piel" class="form-control" value="<?php echo $arrconfigusuarios['piel']; ?>" placeholder="color de piel de la persona">
                                <p class="help-block">Color de Piel del Usuario.</p>
                            </div>

                            <div class="form-group">
                                <label>Respuestas</label>
                                <input id="respuestas" name="respuestas" class="form-control" value="<?php echo $arrconfigusuarios['respuestas']; ?>" placeholder="Respuestas del Usuario">
                                <p class="help-block">Respuesta del usuario.</p>
                            </div>

                            
                            <button type="submit" class="btn btn-default">Enviar</button>
                            <button type="reset" class="btn btn-default">Limpiar</button>

                        </form>

                    </div>

                </div>

                <?php } ?>


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
