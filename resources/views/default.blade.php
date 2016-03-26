 <!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LOGINWEB</title>

    <!-- Bootstrap -->
    {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('plugins/jquery-ui/jquery-ui.min.css', ['media' => 'screen,projection']) !!}
    {!! Html::style('plugins/datetimepicker/jquery.datetimepicker.css') !!}

    {!! Html::style('css/main.css') !!}

    @yield('styles')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>


  <body>

    <nav class="navbar navbar-default menu-general">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">LOGINWEB</a>
        </div>

        <ul class="nav navbar-nav nav-general">
          <li><a href="{{ action('Admin\ClientController@index') }}">Administración</a></li>
          <li><a href="{{ action('Entity\EmployeeController@index') }}">Entidades</a></li>
          <li><a href="{{ action('HumanResources\ContractController@index') }}">Laboral</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
              <li><a href="#!">Perfil</a></li>
              <li class="divider"></li>
              <li><a href="#!">Salir</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </nav>

    <div class="container-fluid">
      @yield('content')    
    </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    {!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::script('plugins/datetimepicker/build/jquery.datetimepicker.full.min.js') !!}
    
    @yield('scripts')

    {!! Html::script('js/main.js') !!}
  </body>
</html>