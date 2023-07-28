<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>CONSULTORIO SAN SANTIAGO</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="../../../demo/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="../../../demo/dist/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="../../../demo/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../../../demo/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true"
                data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <!--begin::Brand-->
                <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                    <!--begin::Logo-->
                    <a href="{{ route('menu') }}">
                        <img alt="Logo" src="{{ asset('img/logo_white_letras_3.png') }}" class="h-70px logo" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Aside toggler-->
                    <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                        data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                        data-kt-toggle-name="aside-minimize">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                        <span class="svg-icon svg-icon-1 rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path opacity="0.5"
                                    d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                    fill="black" />
                                <path
                                    d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Aside toggler-->
                </div>
                <!--end::Brand-->
                <!--begin::Aside menu-->
                <div class="aside-menu flex-column-fluid">
                    <!--begin::Aside Menu-->
                    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
                        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                        data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
                        <!--begin::Menu-->
                        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                            id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

                            <div class="menu-item">
                                <div class="menu-content pt-8 pb-2">
                                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">
                                        @if (auth()->user()->type === 'A')
                                            BIENVENIDO ADMIN
                                        @elseif (auth()->user()->type === 'D')
                                            BIENVENIDO DOCTOR
                                        @elseif(auth()->user()->type === 'E')
                                            BIENVENIDO ENFERMER@
                                        @elseif(auth()->user()->type === 'P')
                                            BIENVEIDO PACIENTE
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                {{-- acceso a todos --}}
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('perfil') }}">
                                        <span class="menu-bullet">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                <path
                                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                                            </svg>
                                        </span>
                                        <span class="menu-title">Perfil</span>
                                    </a>
                                </div>
                                {{-- -ACCESO ADMIN, DOCTOR, ENFERMERA --}}
                                @if (auth()->user()->type === 'A' || (auth()->user()->type === 'E' || auth()->user()->type === 'D'))
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('user.index') }}">
                                            <span class="menu-bullet">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-house-heart" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982Z" />
                                                    <path
                                                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                                                </svg>
                                            </span>
                                            <span class="menu-title">Usuarios</span>
                                        </a>
                                    </div>
                                @endif
                                @if (auth()->user()->type === 'A')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('turno.index') }}">
                                            <span class="menu-bullet">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                                </svg>
                                            </span>
                                            <span class="menu-title">Turnos</span>
                                        </a>
                                    </div>
                                @endif
                                @if (auth()->user()->type === 'A' || auth()->user()->type === 'D')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('citas.index') }}">
                                            <span class="menu-bullet">
                                                <i class="fas fa-calendar"></i>
                                            </span>
                                            <span class="menu-title">Citas</span>
                                        </a>
                                    </div>
                                @endif
                                @if (auth()->user()->type === 'A' || auth()->user()->type === 'E')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('fichas.index') }}">
                                            <span class="menu-bullet">
                                                <i class="fas fa-tag"></i>
                                            </span>
                                            <span class="menu-title">Fichas</span>
                                        </a>
                                    </div>
                                @endif
                                @if (auth()->user()->type === 'D' || auth()->user()->type === 'A')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('consultas.index') }}">
                                            <span class="menu-bullet">
                                                <i class="fas fa-street-view"></i>
                                            </span>
                                            <span class="menu-title">Consultas</span>
                                        </a>
                                    </div>
                                @endif
                                @if (auth()->user()->type === 'D' || (auth()->user()->type === 'A' || (auth()->user()->type = 'E')))
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('historiales.index') }}">
                                            <span class="menu-bullet">
                                                <i class="fas fa-notes-medical"></i>
                                            </span>
                                            <span class="menu-title">Historial Clinico</span>
                                        </a>
                                    </div>
                                @endif
                                @if (auth()->user()->type === 'A')
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('estadisticas.create') }}">
                                            <span class="menu-bullet">
                                                <i class="fas fa-chart-line"></i>
                                            </span>
                                            <span class="menu-title">Estadisticas</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Aside Menu-->
                </div>
                <!--end::Aside menu-->
                <!--begin::Footer-->
                <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
                    <a href="{{ route('logout') }}" class="btn btn-custom btn-primary w-100"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="btn-label">Cerrar Sesión</span>
                        <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                        <span class="svg-icon btn-icon svg-icon-2">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" style="" class="header align-items-stretch">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-center justify-content-between">
                        <!--begin::Aside mobile toggle-->
                        <h1 class="d-flex align-items-center text-dark fw-bolder fs-5 my-1"> <b>


                            </b>
                            <!--begin::Separator-->
                            <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                            <!--end::Separator-->
                            <!--begin::Description-->
                            <div class="cursor-pointer symbol symbol-3px symbol-md-4px dropdown float-left"
                                style="margin-right: 10px" data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                data-kt-menu-placement="bottom-end">

                                <img src="{{ auth()->user()->photo ? Storage::disk('s3')->url(auth()->user()->photo) : '#' }}"
                                    alt="user" />
                                <a href="{{ route('perfil') }}">
                                    <small class="text-muted fs-7 fw-bold my-1 ms-1">{{ auth()->user()->name }}
                                        {{ auth()->user()->apellido }}</small>
                                </a>


                            </div>
                            <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
                                <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                    id="kt_aside_mobile_toggle">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                fill="black" />
                                            <path opacity="0.3"
                                                d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                fill="black" />
                                        </svg>

                                    </span>
                                    <!--end::Svg Icon-->

                                </div>
                            </div>
                    </div>
                    <div class="container-fluid d-flex align-items-center dropdown justify-content-between">
                        <div class="cursor-pointer symbol symbol-3px symbol-md-4px dropdown float-left"
                            style="margin-right: 10px" data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                            data-kt-menu-placement="bottom-end">

                            <small class="text-muted fs-7 fw-bold my-1 ms-1"> </small>



                        </div>
                        <!--end::Aside mobile toggle-->
                        <!--begin::Mobile logo-->

                        <!--end::Mobile logo-->
                        <!--end::Wrapper-->

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                    <!--begin::Toolbar-->
                    <div class="toolbar" id="kt_toolbar">
                        <!--begin::Container-->
                        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

                            <!--begin::Page title-->
                            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                <!--begin::Title-->
                                <div id="app">
                                    <main class="py-4">
                                        @yield('title')
                                    </main>
                                </div>
                                <!--end::Description-->
                                </h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <!--end::Actions-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Toolbar-->
                    <div id="app">
                        <main class="section-1">
                            @include('components.flash_alerts')
                            @yield('content')
                        </main>
                    </div>
                </div>

                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">2023©</span>
                            <a href="https://keenthemes.com" target="_blank"
                                class="text-gray-800 text-hover-primary">Consultorio San Santiago</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                            <li class="menu-item">
                                <a href="#" target="_blank" class="menu-link px-2">About</a>
                            </li>

                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->


    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    @yield('css')
    <!--begin::Javascript-->
    <script>
        var hostUrl = "../../../demo/dist/assets/";
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
        integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="../../../demo/dist/assets/plugins/global/plugins.bundle.js"></script>
    <script src="../../../demo/dist/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="../../../demo/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="../../../demo/dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="../../../demo/dist/assets/js/widgets.bundle.js"></script>
    <script src="../../../demo/dist/assets/js/custom/widgets.js"></script>
    <script src="../../../demo/dist/assets/js/custom/apps/chat/chat.js"></script>
    <script src="../../../demo/dist/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="../../../demo/dist/assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="../../../demo/dist/assets/js/custom/utilities/modals/users-search.js"></script>
    <script src="../../../demo/dist/assets/js/custom/apps/user-management/users/list/table.js"></script>

    {{--  <script src="../../../demo/dist/assets/js/custom/apps/user-management/users/list/export-users.js"></script>  --}}

    <script src="../../../demo/dist/assets/js/widgets.bundle.js"></script>
    <script src="../../../demo/dist/assets/js/custom/widgets.js"></script>
    <script src="../../../demo/dist/assets/js/custom/apps/chat/chat.js"></script>
    <script src="../../../demo/dist/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="../../../demo/dist/assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="../../../demo/dist/assets/js/custom/utilities/modals/users-search.js"></script>
    {{--        <script src="../../../demo/dist/assets/js/custom/apps/calendar/calendar.js"></script>  --}}

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>



    @yield('js')
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
