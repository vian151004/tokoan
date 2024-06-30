<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} | @yield('title')</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('Equation3/ltr/assets/img/favicon.ico') }}"/>

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

        <!-- Scripts -->
        <link href="{{ asset('Equation3/ltr/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('Equation3/ltr/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('Equation3/ltr/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('Equation3/ltr/plugins/font-icons/fontawesome/css/regular.css') }}">
        <link rel="stylesheet" href="{{ asset('Equation3/ltr/plugins/font-icons/fontawesome/css/solid.css') }}">
        <link rel="stylesheet" href="{{ asset('Equation3/ltr/plugins/font-icons/fontawesome/css/brands.css') }}">
        <link rel="stylesheet" href="{{ asset('Equation3/ltr/plugins/font-icons/fontawesome/css/fontawesome.css') }}">
        
        <link href="{{ asset('Equation3/ltr/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('Equation3/ltr/plugins/charts/chartist/chartist.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('Equation3/ltr/assets/css/default-dashboard/style.css') }}" rel="stylesheet" type="text/css" />

        {{-- CHART C3 --}}
        <link href="{{ asset('Equation3/ltr/plugins/charts/c3charts/c3.min.css') }}" rel="stylesheet" type="text/css" />

        {{-- BAR CHART --}}
        <link href="{{ asset('Equation3/ltr/plugins/charts/chartist/chartist.css') }}" rel="stylesheet" type="text/css" />

        {{-- Modal --}}
        <link href="{{ asset('Equation3/ltr/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('Equation3/ltr/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('Equation3/ltr/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />

        {{-- Toast --}}
        <link href="{{ asset('Equation3/ltr/plugins/notification/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
        
        @stack('css_vendor')

        <style>
            .bar-charts .ct-series-a .ct-bar { stroke: #f8538d; }
            .bar-charts .ct-series-b .ct-bar { stroke: #6156ce; }
            .bar-charts .ct-series-c .ct-bar { stroke: #25d5e4; }
            .bar-charts .ct-series-d .ct-bar { stroke: #ffbb44; }
            .bar-charts .ct-series-e .ct-bar { stroke: #18d17f; }
            .bar-charts .ct-series-f .ct-bar { stroke: #3862f5; }
            .bar-charts .ct-series-g .ct-bar { stroke: #e95f2b; }
            /*  Toppings  */
            .bar-charts .ct-series-a .ct-slice-pie { fill: #00b1f4; }

            .crumbs .breadcrumb li {
                margin-top: 8px;
            }

            .table-bordered td, .table-bordered th { border: 1px solid #e9ecef; }

            .text-info {
                color: #17a2b8 !important;
                box-shadow: none !important;
            }
            .text-danger {
                color: #dc3545 !important;
                box-shadow: none !important;
            }
            .fas {
                margin-left: 12px !important;
            }

            .table td, .table th { border-top: 1px solid #f1f3f1; }
            .table-controls>li>a i { color: #d3d3d3; }
        </style>

        @stack('css')

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body>
        <div id="eq-loader">
            <div class="eq-loader-div">
                <div class="eq-loading dual-loader mx-auto mb-5"></div>
            </div>
        </div>
    
        <!--  BEGIN NAVBAR  -->
        @includeIf('layouts.partials.header')
        <!--  END NAVBAR  -->

        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="ps-overlay"></div>
        <div class="search-overlay"></div>
            
        @includeIf('layouts.partials.sidebar')

        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>@yield('title')</h3>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="crumbs">
                                <ul class="breadcrumb float-sm-right mt-4 col-sm-2">
                                    @section('breadcrumb')                                     
                                    <li class="breadcrumb-item"><a href="/"><i class="flaticon-home-fill"></i></a></li>
                                    @show
                                </ul>
                            </div>
                        </div>        
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
        <!-- END MAIN CONTAINER -->
        
        @includeIf('layouts.partials.footer')
    
        <!--  BEGIN PROFILE SIDEBAR  -->
        @includeIf('layouts.partials.profile')
        <!--  BEGIN PROFILE SIDEBAR  -->

        <!-- The element with ID "daily" -->
        <div id="daily" class="ct-chart"></div>
        <div id="weekly" class="ct-chart"></div>
        <div id="month" class="ct-chart"></div>
        
        <script src="{{ asset('Equation3/ltr/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/assets/js/loader.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/plugins/blockui/jquery.blockUI.min.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/assets/js/app.js') }}"></script>
        <script>
            $(document).ready(function() {
                App.init();
            });
        </script>
        <script src="{{ asset('Equation3/ltr/assets/js/custom.js') }}"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->
    
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="{{ asset('Equation3/ltr/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.min.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/plugins/maps/vector/jvector/worldmap_script/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/plugins/charts/chartist/moment.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/plugins/calendar/pignose/moment.latest.min.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/plugins/calendar/pignose/pignose.calendar.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/plugins/progressbar/progressbar.min.js') }}"></script>
        
        {{-- C3 DONUT --}}
        <script src="{{ asset('Equation3/ltr/plugins/charts/d3charts/d3.v3.min.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/plugins/charts/c3charts/c3.min.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/plugins/charts/c3charts/c3-chart-script.js') }}"></script>

        {{-- Modal --}}
        <script src="{{ asset('Equation3/ltr/assets/js/modal/classie.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/assets/js/modal/classie.js') }}"></script>

        <script src="{{ asset('Equation3/ltr/assets/js/default-dashboard/default-custom.js') }}"></script>

        {{-- Toastr --}}
        <script src="{{ asset('Equation3/ltr/plugins/notification/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/assets/js/ui-kit/notification/custom-toastr.js') }}"></script>

        @livewireScripts
        @stack('scripts_vendor')

        <script src="{{ asset('js/custom.js') }}"></script>

        <script>
            checkall('todoAll', 'todochkbox');
            $('[data-toggle="tooltip"]').tooltip()
        </script>
        <x-toast />
        @stack('scripts')
    </body>
</html>
