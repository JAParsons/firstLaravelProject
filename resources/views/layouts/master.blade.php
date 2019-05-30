<!DOCTYPE html>
<html>
    
    <head>
        <title>@yield('title')</title> <?php //hook for getting the title ?>
        <link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png" sizes="32x32" />
        <!-- <link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16"/> -->
        @include('includes.header') <?php //include the navbar header ?>
    </head>
    
    <body>
        <div class="container">
            @yield('content')  <?php //hook for getting the body content ?>
        </div>
    </body>

</html>