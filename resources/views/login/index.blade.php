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

    <br><br>

    <div class="row">
      <div class="col offset-m3 m6">
        {!! Form::open(['action' => 'Auth\LoginController@authenticate']) !!}
          <div class="card">
            <div class="card-content">
              <span class="card-title blue-text darken4">Entrar al Sistema</span>
              <hr>
              {!! Form::text('email', '', ['class' => 'validate', 'placeholder' => 'Ingresar E-mail']) !!}
              <span class="red-text">{{ $errors->first('email') }}</span>
              {!! Form::password('password', '', ['class' => 'validate', 'placeholder' => 'Ingresar Contraseña']) !!}
              <span class="red-text">{{ $errors->first('password') }}</span>
            </div>
            <div class="card-action blue darken-4">
              <button class="btn btn-large waves-effect waves-light amber darken-2" type="submit" name="action">
                Guardar
              </button>
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>    

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    {!! Html::script('bower_components/materialize/js/materialize.min.js') !!}
  
    @yield('script')
  </body>
</html>