<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>orenop</title> <!edit by chee 7/4>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}"> <!-- add by chee 7/4 -->

        
        <!--fontawesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400|Roboto+Condensed:300,400" rel="stylesheet">

    </head>
    <body>
      @include('commons.navbar')
    
    <left class ='col-md-offset-0 col-md-12'>
    <img src="/images/users1.jpg"> 
    <img src="/images/users2.jpg"> 
    <img src="/images/users3.jpg"> 
    <img src="/images/users4.jpg"> 
    </left>
        <div class="container">
        </div>
      @include('commons.error_messages')
      @include('commons.footer')
      </center>
    </body>
</html>

   