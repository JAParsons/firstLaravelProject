<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title> <?php //hook for getting the title ?>
    </head>
    <body>
        <div class="container">
            @yield('content')  <?php // hook for getting the body content?>
        </div>
    </body>
</html>