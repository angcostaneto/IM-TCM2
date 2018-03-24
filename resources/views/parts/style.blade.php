<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="{{ asset( 'css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="{{ asset ('css/mdb.min.css') }}" rel="stylesheet">
@if (Request::is('/') || Request::is('login'))
    <link href="{{ asset ('css/style.home.min.css') }}" rel="stylesheet">
 @else
    <link href="{{ asset ('css/style.min.css') }}" rel="stylesheet">
@endif

@stack('styles')