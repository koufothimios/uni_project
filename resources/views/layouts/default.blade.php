<!DOCTYPE html>
<html>
    <head>
        @include('includes.header')
    </head>
    <body>

            @yield('nav')

            @yield('main')

            @yield('footer')

        @include('includes.js_default')
        @yield('js')
    </body>
</html>
