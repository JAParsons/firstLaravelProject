<!DOCTYPE html>
<html>
    
    <head>
        <title>@yield('title')</title> <?php //hook for getting the title ?>
        @include('includes.header') <?php //include the navbar header ?>
    </head>
    
    <body>
        <div class="container">
            @yield('content')  <?php //hook for getting the body content ?>
        </div>
    </body>

</html>