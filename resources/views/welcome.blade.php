<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('landing/css/hero-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/templatemo-main.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/owl-carousel.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/portal.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 

    <script src="{{ asset('landing/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
</head>
<!--
Vanilla Template
https://templatemo.com/tm-526-vanilla
-->
<body style="background-image: url({{asset('img/authfondo.jpg')}});background-repeat: no-repeat;
background-size: 100% 100%;">

    <div class="fixed-side-navbar">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="#bienvenida"><span>Bienvenida</span></a></li>
        </ul>
    </div>

    <div class="parallax-content baner-content" id="bienvenida">
        <div class="container">
            <div class="first-content">
                <h1>Claro insurance crud</h1>
                <span><img src="" alt=""></span>
            </div>

                <span class="primary-button">
                    <a href="{{ route('login') }}">Iniciar Sesión</a>
                </span>&nbsp;  
        </div>
    </div>



<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li class="logoface"><a href="#"  target="_blank"><i class="fab fa-facebook"></i></a></li>
                    <li class="logotwitter"><a href="#"  target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li class="logolink"><a href="#"  target="_blank"><i class="fab fa-linkedin"></i></a></li>
                </ul>
                <p>Copyright &copy; 2021 
                    <a rel="nofollow noopener" href="#"  target="_blank"><em>Juan Soler</em>
                    </a>. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="landing/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="{{ asset('plugins/popper/popper.min.js')}}"></script>
    
    <script src="{{ asset('landing/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/plugins.js') }}"></script>
    <script src="{{ asset('landing/js/main.js') }}"></script>
    <script src="{{ asset('landing/js/landing.js')}}"></script>
    

   <script>

    $(document).ready(function(){
          // Add smooth scrolling to all links
          $(".fixed-side-navbar a, .primary-button a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
              // Prevent default anchor click behavior
              event.preventDefault();

              // Store hash
              var hash = this.hash;

              // Using jQuery's animate() method to add smooth page scroll
              // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
              $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
            } // End if
        });
      });
  </script>

</body>
</html>