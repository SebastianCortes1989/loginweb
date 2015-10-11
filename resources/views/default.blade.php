 <!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    {!! Html::style('bower_components/materialize/css/materialize.min.css', ['media' => 'screen,projection']) !!}
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>LOGINWEB</title>
  </head>

  <body>

    <nav class="blue darken-4">
      <div class="nav-wrappe">
        <a href="#" class="brand-logo">LOGINWEB</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="sass.html">Administración</a></li>
          <li><a href="badges.html">Laboral</a></li>
          <li>
            <a class='dropdown-button' href='#' data-activates='dropdown1'>Username</a>

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
  
    @yield('script')
  </body>
</html>