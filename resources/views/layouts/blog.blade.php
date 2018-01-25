<!doctype html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('shared.head')
    @yield('styles')
</head>
<body>
    <header class="row">
        @include('shared.navigation')
        <div class="blog-header">
        <div class="container">
          <h1 class="blog-title">The Bootstrap Blog</h1>
          <p class="lead blog-description">An example blog.</p>
        </div>
      </div>
    </header>

    <main role="main" class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">
            <!-- main content -->
            @yield('content')
        </div><!-- /.blog-main -->

            <!-- sidebar content -->
        
            @include('shared.sidebar')
        
      </div><!-- /.row -->
    </main>

    <footer class="row">
        @include('shared.footer')
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    @yield('scripts')

</body>
</html>
