<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no, address=no" />
    <title>{{ print_title(site_name) . ' | ' }}{{ isset($title) ? print_title($title) : '' }}</title>
    <!-- Favicon [ 16*16 SVG ]-->
    <link href="{{ asset('/assets/images/favicon.png') }}" rel="icon" class="favicon">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Bootstrap  CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/web/vendors/bootstrap/css/bootstrap.min.css') }}">
    <!-- Custome CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/admin.css') }}" />
    <link href="{{ asset('assets/admin/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/web/vendors/owl.carousel/css/owl.carousel.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/rangeslider.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
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
    @yield('head_css')
    <style>
        .maintaince ul {
            list-style: disc;
            padding-left: 20px;
            margin-bottom: 48px;
        }

        .maintaince ul li:not(:last-child) {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-572LPM3G" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <a class="maintaince-modal hidden" data-toggle="modal" data-target="#maintainceModal">View</a>
    <div class="modal fade maintaince" id="maintainceModal" tabindex="-1" role="dialog"
        aria-labelledby="maintainceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <h2 class="modal-title" id="maintainceModalLabel">Important Notice</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="28" height="28" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p>The website is currently undergoing maintenance as there have been some technical issues and bugs
                        that need to be fixed. There will not be any new jobs posted on the find jobs section until the
                        bugs have been resolved. Whilst we are fixing the technical issues we are also taking the
                        opportunity to make improvements to the site that you may notice when pushed live. We will
                        notify you by email and SMS as soon as the site is back up and running.</p>
                    <h5 class="mt-5">New features:</h5>
                    <ul>
                        <li>Ability to view other transporter bids and messages to users.</li>
                        <li>Lower commission as little as 3%</li>
                        <li>Improved transporter feedback profile design</li>
                    </ul>
                    <p>Thank you for your patients.</p>
                    <p>Kind regards,</p>
                    <p>Transport Any Car Team</p>
                    <p>If you have any questions or suggestions please email us <a
                            href="mailto:support@transportanycar.com">support@transportanycar.com</a></p>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
</body>
<!-- Bootstrap JS & Jquery -->
<script src="{{ asset('assets/web/vendors/jquery/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.js"></script>
<script src="{{ asset('assets/web/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/general/toastr/build/toastr.min.js') }}"></script>
<!-- <script src="{{ asset('assets/web/js/admin.js') }}"></script> -->
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
    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.querySelector('.maintaince-modal');
        if (modal) {
            modal.click();
        }
    });
    $(function() {
        @if (session('error'))
            toastr.error('{{ session('
                        error ') }}', '', {
                timeOut: 2000
            });
        @elseif (session('success'))
            toastr.success('{{ session('
                        success ') }}', '', {
                timeOut: 2000
            });
        @endif
    });
</script>
<script src="{{ asset('/assets/admin/vendors/general/validate/jquery.validate.min.js') }}"></script>
@yield('script')

</html>
