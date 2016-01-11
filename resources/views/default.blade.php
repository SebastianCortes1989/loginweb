 <!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    {!! Html::style('bower_components/materialize/css/materialize.min.css', ['media' => 'screen,projection']) !!}
    {!! Html::style('plugins/jquery-ui/jquery-ui.min.css', ['media' => 'screen,projection']) !!}
    {!! Html::style('plugins/datetimepicker/jquery.datetimepicker.css') !!}
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>LOGINWEB</title>
  </head>

  <body>

    <nav class="blue darken-4">
      <div class="nav-wrappe">
        <a href="#" class="brand-logo">LOGINWEB</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="{{ action('Admin\ClientController@index') }}">Administración</a></li>
          <li><a href="{{ action('Entity\EmployeeController@index') }}">Entidades</a></li>
          <li><a href="{{ action('HumanResources\ContractController@index') }}">Laboral</a></li>
          <li>
            <a class='dropdown-button' href='#' data-activates='dropdown1'>Usuario</a>

            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
              <li><a href="#!">Perfil</a></li>
              <li class="divider"></li>
              <li><a href="#!">Salir</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    @yield('content')

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    {!! Html::script('bower_components/materialize/js/materialize.min.js') !!}
    {!! Html::script('plugins/datetimepicker/build/jquery.datetimepicker.full.min.js') !!}
    
    @yield('scripts')

    {!! Html::script('js/main.js') !!}
  </body>
</html>