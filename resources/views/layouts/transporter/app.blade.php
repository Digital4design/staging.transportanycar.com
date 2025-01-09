<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" />
    <title>{{print_title(site_name).' | '}}{{ isset($title)?print_title($title) : ''}}</title>
    <!-- Favicon [ 16*16 SVG ]-->
    <link href="{{asset('/assets/images/favicon.png')}}" rel="icon" class="favicon">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Bootstrap  CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/vendors/bootstrap/css/bootstrap.min.css')}}">
    <!-- owl slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/vendors/owl.carousel/css/owl.carousel.min.css')}}" />
    <!-- Custome CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/header_footer.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/responsive.css')}}" />
    <link href="{{asset('assets/admin/vendors/general/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css"/>
    @yield('head_css')
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-572LPM3G');</script>
</head>
<body>
@yield('content')
</body>
<!-- Bootstrap JS & Jquery -->
<script src="{{asset('assets/web/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/web/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/web/vendors/owl.carousel/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/general/toastr/build/toastr.min.js')}}"></script>
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
