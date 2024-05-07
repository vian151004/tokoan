<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Default | Equation - Multipurpose Bootstrap Dashboard Template </title>
    

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    @stack('css_vendor')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div id="eq-loader">
      <div class="eq-loader-div">
          <div class="eq-loading dual-loader mx-auto mb-5"></div>
      </div>
    </div>

    @includeIf('layouts.partials.header')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="ps-overlay"></div>
        <div class="search-overlay"></div>
        
        @includeIf('layouts.partials.sidebar')
    </div>
    <!-- END MAIN CONTAINER -->

    @includeIf('layouts.partials.footer')

    <!--  BEGIN PROFILE SIDEBAR  -->
    @includeIf('layouts.partials.profile')
    <!--  BEGIN PROFILE SIDEBAR  -->

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
    <script src="{{ asset('Equation3/ltr/plugins/charts/chartist/chartist.js') }}"></script>
    <script src="{{ asset('Equation3/ltr/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('Equation3/ltr/plugins/maps/vector/jvector/worldmap_script/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('Equation3/ltr/plugins/calendar/pignose/moment.latest.min.js') }}"></script>
    <script src="{{ asset('Equation3/ltr/plugins/calendar/pignose/pignose.calendar.js') }}"></script>
    <script src="{{ asset('Equation3/ltr/plugins/progressbar/progressbar.min.js') }}"></script>
    <script src="{{ asset('Equation3/ltr/assets/js/default-dashboard/default-custom.js') }}"></script>
    
    @stack('scripts_vendor')

    @livewireScripts
    @stack('scripts')
</body>
</html>