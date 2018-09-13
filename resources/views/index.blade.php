<!DOCTYPE html>
<html>
    <head>
        <title>March Fashion</title>
        <base href="{{asset('')}}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    </head>
    <body>
        <div id="container">
            <!--Header-->
            @include('layouts.header')

            <!-- slider -->
            @include('layouts.slider')

            <!--   Contents  -->
            @yield('content')   
                
            <!-- Footer -->

            @include('layouts.footer')

        </div>
        
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.js') }}"></script>
        <script>
                    $(document).ready(function() {
                      var owl = $('.owl-carousel');
                      owl.owlCarousel({
                        margin: 10,
                        nav: false,
                        loop: true,
                        // items: 5,
                        responsive: {
                          0: {
                            items: 1
                          },
                          600: {
                            items: 3
                          },
                          1000: {
                            items: 5
                          }
                        }
                      })
                    })
        </script>
        
    </body>
</html>
