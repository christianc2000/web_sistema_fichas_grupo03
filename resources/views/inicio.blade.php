@extends('layouts.frontend.index')
@section('redes')
    <div class="red">
        <div id="facebook">
            <a href="https://www.facebook.com/angelica.mirandamendoza.9" target="none" class="fab fa-facebook-f "></a>
        </div>
        <div id="instagram">
            <a href="https://www.instagram.com/angelicamiranda.m/" target="none" class="fab fa-instagram"></a>
        </div>
        <div id="twiter">
            <a href="https://twitter.com/MirandaMedoza" target="none" class="fab fa-twitter-square"></a>
        </div>
        <div id="whatsaap">
            <a href="#" target="none" class="fab fa-whatsapp"></a>
        </div>
        <div id="linkeding">
            <a href="#" target="none" class="fab fa-linkedin"></a>
        </div>
    </div>
@endsection
@section('navbar_top')
    <div class="header-top">
        <div class="container d-flex justify-content-between">
            <div class="d-inline-flex ml-auto">

            </div>
        </div>
    </div>
@endsection
@section('navbar')
    <header>
        <a href="#" class="logo bg-black">

            <img class="imgtamaño" src="{{ asset('img/logo_gray.png') }}" alt="Consultorio">
        </a>
        <div class="menu-toggle"></div>
        <nav>
            <ul>
                <li><a href="" class="active">INICIO</a></li>
                <li><a href="{{ route('login') }}">LOGIN</a></li>

            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
@endsection
@section('banner')
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-text">
                        <h1 class="tipeo1">CONSULTORIO SAN SANTIAGO</h1>
                        <h1 class="tipeo2"><span class="type"></span></h1>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <footer class="footer">
        <div class="l-footer">
            <img class="footer_img" src="{{ asset('img/logo_white_letras_3.png') }}" alt="Protecting You">

        </div>
        <ul class="r-footer">
            <li>
                <h2>Social</h2>
                <ul class="box">
                    <li class="button_social">
                        <i class="fab mr-2 fa-facebook"></i>
                        <a href="https://www.facebook.com/angelica.mirandamendoza.9" target="_blank">Facebook</a>
                    </li>
                    <li class="button_social">
                        <i class="fab mr-2 fa-twitter"></i>
                        <a href="https://twitter.com/MirandaMedoza">Twitter</a>
                    </li>
                    <li class="button_social">
                        <i class="fab mr-2 fa-instagram"></i>
                        <a href="https://www.instagram.com/angelicamiranda.m/" target="_blank">Instagram</a>
                    </li>
                    <li class="button_social">
                        <i class="fab mr-2 fa-linkedin-in"></i>
                        <a href="#" target="_blank">Linkedin</a>
                    </li>
                </ul>
            </li>
            <li class="features">
                <h2>Información</h2>
                <ul class="box">
                    <li><a href="#">Políticas de Privacidad</a></li>
                    <li><a href="#">Trabaja con nosotros</a></li>
                </ul>
            </li>

        </ul>

    </footer>
@endsection
