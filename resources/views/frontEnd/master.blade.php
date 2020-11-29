<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>@yield('Title')</title>
        <!-- web fo        nts -->
        <link href="//fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900&display=swap" re        l="stylesheet">
        <!-- //web fonts -->
        <!-- Template CSS -->
        <link rel="stylesheet" href="{{asset('/public/frontend')}}/assets/css/style-starter.css">
        
        
<!--        search-->
 
<!--        search-->
        
        
        
    </head>
    <body>
        
        @include('frontEnd.includes.header')
        
        <!-- //Top Menu 1 -->
        @include('frontEnd.includes.menu')
        <!-- //Top Menu 1 -->
        
        @include('frontEnd.includes.slider')
     

        @yield('mainContent')

                
        @include('frontEnd.includes.footer')
        
        <script src="{{asset('/public/frontend')}}/assets/js/jquery-3.3.1.min.js"></script>
        <!-- //footer-28 block -->
    </section>
    <script>
                $(function () {
                    $('.navbar-toggler').click(function () {
                        $('body').toggleClass('noscroll');
                    })
                });
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <!-- Template JavaScript -->
    <script src="{{asset('/public/frontend')}}/assets/js/all.js"></script>
    <!-- Smooth scrolling -->
    <!-- <script src="assets/js/smoothscroll.js"></script> -->
    <script src="{{asset('/public/frontend')}}/assets/js/owl.carousel.js"></script>

    <!-- script for -->
    <script>
                $(document).ready(function () {
                    $('.owl-one').owlCarousel({
                        loop: true,
                        margin: 0,
                        nav: true,
                        responsiveClass: true,
                        autoplay: false,
                        autoplayTimeout: 5000,
                        autoplaySpeed: 1000,
                        autoplayHoverPause: false,
                        responsive: {
                            0: {
                                items: 1,
                                nav: false
                            },
                            480: {
                                items: 1,
                                nav: false
                            },
                            667: {
                                items: 1,
                                nav: true
                            },
                            1000: {
                                items: 1,
                                nav: true
                            }
                        }
                    })
                })
    </script>
    <!-- //script -->

</body>

</html>

<!-- // search block 5 -->

<!-- // search block 5 -->