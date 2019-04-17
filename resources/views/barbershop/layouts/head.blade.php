<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type = "text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Ultra" rel="stylesheet">  -->

    <!-- Styles -->
    <link href="{{ asset('css/bs/bs.css') }}" rel="stylesheet">
     
    <!-- Проверка Role -->
    @if ( $user_role == 'SuperRoot' )
    <link href="{{ asset('css/bs/bs_superroot.css') }}" rel="stylesheet">
    @endif
    @if ( $user_role == 'Director' )
    <link href="{{ asset('css/bs/bs_director.css') }}" rel="stylesheet">
    @endif
    @if ( $user_role == 'Administrator' )
    <link href="{{ asset('css/bs/bs_administrator.css') }}" rel="stylesheet">
    @endif
    @if ( $user_role == 'HairDresser' )
    <link href="{{ asset('css/bs/bs_hairdresser.css') }}" rel="stylesheet">
    @endif
    @if ( $user_role == 'User' )
    <link href="{{ asset('css/bs/bs_user.css') }}" rel="stylesheet">
    @endif
    @if ( $user_role == NULL )
    <link href="{{ asset('css/bs/bs_null.css') }}" rel="stylesheet">
    @endif