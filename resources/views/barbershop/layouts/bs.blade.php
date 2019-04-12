<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include ('barbershop.layouts.head')
    </head>
    <body>
        <div id="app">
            <div class="container-fluid p-0"> 
                <div class="vh-main-top p-0 m-0">  
                    @include ('barbershop.layouts.navbar')
                </div>
                <div class="vh-main-bottom">
                    <div class="col-2 h-100 p-0 dk-rs dk-f-l">
                        @include ('barbershop.layouts.left_menu')
                    </div>
                    <div class="col-10 h-100 p-0 dk-rs dk-f-l">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        @include ('barbershop.layouts.about')  
        <script type="text/javascript" src="{{ asset('js/bs/main.js') }}"></script>
    </body>
</html>