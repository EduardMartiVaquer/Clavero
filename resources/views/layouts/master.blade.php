<!DOCTYPE html>
<html lang="es">
<head>
    <title>Masnou Clav</title>
    <meta name="description" content="">
    <meta charset="UTF-8">
    <meta name="author" content="E&M">
    <link rel="shortcut icon" type="image/png" href="/favicon.png">
    <link rel="icon" type="image/png" href="/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
@if(is_null(Cookie::get('accept_cookies')))
    @include('layouts.cookies')
@endif

@include('layouts.navbar')

<div id="page-messages">
    @if (count($errors) > 0)
        <div class="message alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
            <h4>¡Vaya! Ha habido un error</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(isset($pageMessage))
        <div class="message alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
            <h4>{{$pageMessage}}</h4>
        </div>
    @endif
</div>

@yield('content')

</body>

<script>
    function showBadMessage(message) {
        $('#page-messages').empty();
        document.getElementById('page-messages').innerHTML += '<div id="page-message" class="message alert alert-danger alert-dismissible fade in" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>' +
                '<h4>¡Vaya! Ha habido un error</h4>' +
                '<ul>' +
                '<li>' + message + '</li>' +
                '</ul>' +
                '</div>';
    }

    function showGoodMessage(message) {
        $('#page-messages').empty();
        document.getElementById('page-messages').innerHTML += '<div id="page-message" class="message alert alert-success alert-dismissible fade in" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>' +
                '<h3 class="text-center"><i class="fa fa-info-circle"></i> ' + message + '</h3>' +
                '</div>';
        setTimeout(function(){ $('#page-message').fadeOut() }, 3000);
    }
</script>
</html>