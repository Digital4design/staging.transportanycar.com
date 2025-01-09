<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>{{print_title(site_name).' | '}}{{ isset($title)?print_title($title) : ''}}</title>
    <!-- Favicon [ 16*16 SVG ]-->
    <link href="{{asset('/assets/images/favicon.png')}}" rel="icon" class="favicon">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Bootstrap  CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/vendors/bootstrap/css/bootstrap.min.css')}}">
    <!-- Custome CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/admin.css')}}" />
    <link href="{{asset('assets/admin/vendors/general/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/vendors/owl.carousel/css/owl.carousel.min.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/rangeslider.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
          new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
          'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
          })(window,document,'script','dataLayer','GTM-572LPM3G');</script>
    @yield('head_css')
</head>
<body>
@yield('content')
</body>
<!-- Bootstrap JS & Jquery -->
<script src="{{asset('assets/web/vendors/jquery/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.js"></script>
<script src="{{asset('assets/web/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/general/toastr/build/toastr.min.js')}}"></script>
<!-- <script src="{{asset('assets/web/js/admin.js')}}"></script> -->
<script>
    function myFunction(x) {
      if (x.matches) {
        $(document).ready(function() {
          $('#dropdownMenuButton').click(function() {
            //$('.dropdown-menu').show();
            $('html').addClass("drop_active");
          });
        });
        $(document).ready(function() {
          $('#dropdownClose').click(function() {
            $('.dropdown-menu').hide();
            $('html').removeClass("drop_active");
            $('body').removeClass('notification-scroll');
          });
        });
        $(document).ready(function() {
          $('#dropdownCrossClose').click(function() {
            $('.dropdown-menu').hide();
            $('html').removeClass("drop_active");
            $('body').removeClass('notification-scroll');
          });
        });
        
      }

      $(document).ready(function() {
        $('#dropdownMenuButton').click(function() {
          //$('.dropdown-menu').slideToggle("slow"); 
          var $dropdownMenu = $('.dropdown-menu'); 
          if ($dropdownMenu.is(':visible')) {
              $dropdownMenu.slideUp("slow");
              $('body').removeClass('notification-scroll');
          } else {
              $dropdownMenu.slideDown("slow");
              $('body').addClass('notification-scroll');
          }
        });
        $('#sidebarToggle').click(function() {
          $('.dropdown-menu').hide();            
        });

        $(document).ready(function() {
          $('#dropdownClose').click(function() {
            $('.dropdown-menu').hide();
            $('body').removeClass('notification-scroll');
          });
        });

      });
    }

    var x = window.matchMedia("(max-width: 575px)")
    myFunction(x)
    x.addListener(myFunction)
</script> 
<script>
    $(function () {
        @if(session('error'))
        toastr.error('{{session('error')}}', '', { timeOut: 2000 });
        @elseif(session('success'))
        toastr.success('{{session('success')}}', '', { timeOut: 2000 });
        @endif
    });
</script>
<script src="{{asset('/assets/admin/vendors/general/validate/jquery.validate.min.js')}}"></script>
@yield('script')
</html>
