<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>CONSULTORIO SAN SANTIAGO</title>

    <!--LINNK-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- Styles -->
    <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/slick.css') }}" rel="stylesheet">
</head>

<body>
    @yield('redes')
    <section id="headerSection">
        @yield('navbar_top')
        @yield('navbar')
        @yield('banner')
    </section>
    @yield('cards_service')
    @yield('title')
   
    @yield('title5')
    @yield('Proveedores')
    @yield('title2')
    
    @yield('products')
    @yield('footer')
    @yield('modals')
    <!--SCRIPT-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/hgnka.js') }}"></script>
    <script src="{{ asset('js/security.js') }}"></script>
    <script src="{{ asset('js/provee.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/typed.js') }}"></script>
    <script>
        var typed = new Typed('.type', {
            strings: ['Consultas y servicios', ' Tu mejor opción'],
            typeSpeed: 60,
            backSpeed: 60,
            loop: true
        });
    </script>
</body>

</html>
