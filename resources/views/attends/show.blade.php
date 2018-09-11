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
        <script src="/js/tab.js"></script>
        
        <!--fontawesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        <script src="jquery.min.js" type="text/javascript"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400|Roboto+Condensed:300,400" rel="stylesheet">


    </head>
    <body> 
              <br>
                <div class="center jumbotron">
                      <div class="text-center">
                          @if($attend->status == 'Late' or $attend->status == 'Absent')
                              <h2>GHRが確認致しますので、<br><br><b><u>09時30分頃</u></b><br>に再度ログインしてください。</h2>
                              <br>
                              <h4>その際、"Confirm: GHR確認中"となっている場合はメールにて直接GHRにご連絡ください。</h4>
                              
                          @elseif($attend->status == 'Attend')
                              <h1>HAVE A NICE DAY❤</h1>
                          @endif
                              <h2>{{$user->nickname}}'s Status</h2>
                              <h2><b>{{$attend->status}}</b></h2>
                              <br>
               
                      </div>
                </div>
                     <center> {!! link_to_route('index', 'Back to home') !!} </center>
        <div class="container">
           @include('commons.error_messages')
           @yield('content')
        </div>
      @include('commons.footer')
    </body>
</html>