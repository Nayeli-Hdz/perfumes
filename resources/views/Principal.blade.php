<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Golden Moon</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <!--<link rel="shortcut icon" href="favicon_16.ico"/>
        <link rel="bookmark" href="favicon_16.ico"/>-->
     
    <!-- site css -->
    <link rel="stylesheet" href="{{asset('dist/css/site.min.css')}}">
    <script type="text/javascript" src="dist/js/site.min.js"></script>
  </head>
  
  <body>
    <!--nav-->
    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
           
            <a class="navbar-brand">Golden Moon</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a >Información</a></li>
              <li class="active"><a >Documentación</a></li>
              <!-- <li class="disabled"><a href="#">Link</a></li> -->
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle">Perfil <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li><a >Configuración</a></li>
                  <li><a>Cerrar Sesión</a></li>
                </ul>
              </li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>


    <!--header-->
          <div class="container-fluid">
            <!--documents-->
                <div class="row row-offcanvas row-offcanvas-left">
                  <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
                    <ul class="list-group panel">
                        <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>Contenido</b></li>
                        <li class="list-group-item"><input type="text" class="form-control search-query" placeholder="Buscar"></li>
                        <li class="list-group-item"><a href="/reporteadmin"><i class="glyphicon glyphicon-lock"></i>Administradores</a></li>
                        <li class="list-group-item"><a href="/ReporteMarcas"><i class="glyphicon glyphicon-home"></i>Marcas </a></li>
                        <li class="list-group-item"><a href="/ReporteProveedores"><i class="glyphicon glyphicon-bell"></i>Proveedores</li>
                        <li class="list-group-item"><a href="/ReporteProductos"><i class="glyphicon glyphicon-lock"></i>Productos</a></li>
                        <li class="list-group-item"><a href="/reportepaqueteria"><i class="glyphicon glyphicon-lock"></i>Paqueteria</a></li>
                        <li class="list-group-item"><a href="/reporteusuarios"><i class="glyphicon glyphicon-lock"></i>Usuarios</a></li>
                        
                      </ul>
                  </div>
        



          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div style="background-color:#2ABB9B;" class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar">
                  <span class="fa fa-angle-double-left" data-toggle="offcanvas" ></span></a> Menú</h3>
              </div>
              <div class="panel-body">
                  <div class="content-row">

                    <div class="panel panel-warning">
                      
                      <div class="panel-body">

                        @yield('contenido')

                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>

    </body>
    </html> 
                            
