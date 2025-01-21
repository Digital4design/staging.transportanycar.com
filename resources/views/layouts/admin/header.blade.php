<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{ route('front.dashboard') }}">
    <title>{{ isset($title) ? print_title($title) . ' | ' : '' }}{{ print_title(site_name) }}</title>
    <link href="{{ Favicon }}" rel="icon" type="image/x-icon">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.bundle.css') }}">
    <link href="{{ asset('assets/admin/css/login-2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!--Script World Start from here-->
    <script src="{{ asset('assets/admin/vendors/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/vendors/general/jquery.validate.min.js') }}" type="text/javascript"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script> -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-572LPM3G');
    </script>
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1021095402532180');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1"
            src="https://www.facebook.com/tr?id=1021095402532180&ev=PageView
            &noscript=1" />
    </noscript>
    @yield('h_style')
    @include('general.header_includes')

    <style>
        .error {
            color: red;
        }

        .toast-title {
            color: white !important;
        }

        .logo_new_style {
            width: 200px;
            margin-top: 18px;
        }

        .admin_logo_size {
            max-width: 300px;
            max-height: 100px;
        }
    </style>
    @yield('h_script')
</head>

<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-572LPM3G"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>