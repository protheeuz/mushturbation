<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bashturbation</title>
    <meta name="description" content="Bashturbation">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS STYLE -->
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>

<body>
    <!-- Left Panel -->
    @include('includes.sidebar')
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header -->
        @include('includes.navbar')
        <!-- /#header -->

        <!-- Content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->

        <div class="clearfix"></div>

        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Bashturbation
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://https://mrdoob.com/projects/chromeexperiments/google-gravity/">Bashturbation</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- script js -->
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
    <!-- /script js -->
</body>
</html>
