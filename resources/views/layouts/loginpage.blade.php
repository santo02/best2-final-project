<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Investree</title>
        <link rel="icon" type = "image/png" href = "assets/img/icon.png">
        @stack('prepend-style')
        @include('includes.homepage.stylesheet')
        @stack('addon-style')
    </head>

    <body style="/*background: url(&quot;design.jpg&quot;);*/background-position: 0 -60px;">
        {{-- NavigationBar --}}
        @include('includes.homepage.navbar')
        
        <main>
            {{-- Loginpage --}}
            @yield('login-content')
        </main>

        {{-- Footer --}}
        @include('includes.homepage.footer')

        {{-- Script --}}
        @stack('prepend-script')
        @include('includes.homepage.script')
        @stack('addon-script')
    </body>
</html>