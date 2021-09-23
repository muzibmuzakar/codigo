<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Codigo</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets-frontend/img/logo.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets-frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets-frontend/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-frontend/vendor/owl.carousel/assets-frontend/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-frontend/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-frontend/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets-frontend/css/style.css') }}" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" integrity="sha512-GZ1RIgZaSc8rnco/8CXfRdCpDxRCphenIiZ2ztLy3XQfCbQUSCuk8IudvNHxkRA3oUg6q0qejgN/qqyG1duv5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <!-- =======================================================
  * Template Name: BizLand - v1.1.1
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="/">Codigo<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets-frontend/img/logo.png" alt=""></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/#pelajaran">Pelajaran</a></li>
          <li><a href="/#about">About</a></li>
          @if(Auth::check())
          <li class="drop-down">
            <a href="#"><img class="img-profile rounded-circle" style="width: 35px; margin-top:-10px;" src="{{ asset('img/undraw_profile.svg')}}"></a>
            <ul>
              <li><a href="#">{{ Auth::user()->name }}</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><form id="myForm" action="{{ route('logout') }}" method="POST">
                @csrf
                <a class="submit" href="#">Logout</a>
            </form></li>
            </ul>
          </li>
          @else
          <li><a href="{{ route('login') }}">Sign In</a></li>
          @endif        
          

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->


  <main id="main">
    
    @yield('main')
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Zibmuzakar</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">MuzibMuzakar</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets-frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('assets-frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets-frontend/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{ asset('assets-frontend/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('assets-frontend/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('assets-frontend/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{ asset('assets-frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('assets-frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('assets-frontend/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{ asset('assets-frontend/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets-frontend/js/main.js')}}"></script>
  <script src="{{ asset('js/login-page.js')}}"></script>

  <script>
        $(document).ready(function(){
            $("a.submit").click(function(){
                document.getElementById("myForm").submit();
            }); 
        });
  </script>

</body>

</html>