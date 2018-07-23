<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>orenop</title> <!edit by chee 7/4>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}"> <!add by chee 7/4>
        
        <!--fontawesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
   
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300" rel="stylesheet"> 
   
    </head>
    <body>
      @include('commons.navbar')

        <div class="container">
      @include('commons.error_messages')

      @yield('content')
        </div>
      @include('commons.footer')
    </body>
</html>
