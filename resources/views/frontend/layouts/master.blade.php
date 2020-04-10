<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    @yield('head')
    <title>Nursa Blog </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('frontend/all.css')}}">

</head>

<body>

<!-- Navigation -->
@yield('navigation')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
            @yield('content')
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            @yield('sidebar')
        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; <a href="http://www.nursa.me">Nursa</a>  Team 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
