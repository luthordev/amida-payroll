@include('dashboard.theme.header')
    <body class="sb-nav-fixed">

        @include('dashboard.theme.sidebar')
        
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">@yield('title')</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">@yield('subtitle')</li>
                        </ol>

                        @yield('content')

                    </div>
                </main>
                
                @include('dashboard.theme.footer')

            </div>
        </div>

        @yield('modal')
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{!! asset('js/scripts.js') !!}"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{!! asset('assets/demo/chart-area-demo.js') !!}"></script>
        <script src="{!! asset('assets/demo/chart-bar-demo.js') !!}"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{!! asset('js/datatables-simple-demo.js') !!}"></script>
    </body>
</html>