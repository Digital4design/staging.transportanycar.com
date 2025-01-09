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
    <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16465579063"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-16465579063'); </script>
    @if(isset($title) && $title === 'Dashboard')
      <!-- Event snippet for Quote request conversion page -->
      <script>
          try {
              gtag('event', 'conversion', {
                  'send_to': 'AW-16465579063/cWA3CL_Yv8oZELeYs6s9'
              });
          } catch (error) {
              console.error('Google Tag Manager error:', error);
          }
      </script>
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-572LPM3G');</script>
  @endif
</head>
<body>
@yield('content')
</body>

<!-- Bootstrap JS & Jquery -->
<script src="{{asset('assets/web/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/web/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/general/toastr/build/toastr.min.js')}}"></script>
<script src="{{asset('/assets/admin/vendors/general/validate/jquery.validate.min.js')}}"></script>
<script>
    $(function () {
        @if(session('error'))
        toastr.error('{{session('error')}}', '', { timeOut: 2000 });
        @elseif(session('success'))
        toastr.success('{{session('success')}}', '', { timeOut: 2000 });
        @endif
    });

    function addOverlay() {
        $('#loader_display_d').show();
    }

    function removeOverlay() {
        $('#loader_display_d').hide();
    }

</script>
<script>
    function myFunction(x) {
      if (x.matches) {
        $(document).ready(function() {
          $('#dropdownMenuButton').click(function() {
            $('.dropdown-menu').show();
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

      } else {
       $(document).ready(function() {
          // $('.wd-profile #dropdownMenuButton').click(function() {
          //   $('.wd-profile .dropdown-menu').slideToggle("slow");
          // });
          $('.wd-profile #dropdownMenuButton').click(function() {
              var $dropdownMenu = $('.wd-profile .dropdown-menu');
              
              if ($dropdownMenu.is(':visible')) {
                  $dropdownMenu.slideUp("slow");
                  $('body').removeClass('notification-scroll');
              } else {
                  $dropdownMenu.slideDown("slow");
                  $('body').addClass('notification-scroll');
              }
          });
          $('#dropdownClose_desk').click(function() {
            $('.dropdown-menu').hide();
            $('body').removeClass('notification-scroll');
          });
        });
      }
    }

    $(document).ready(function() {
      // $('#dropdownMenuButton').click(function() {
      //   $('.dropdown-menu').slideToggle("slow");
      // });

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

      $('.nav-toggle').click(function() {
        $('.dropdown-menu').hide();            
      });

      $(document).ready(function() {
          $('#dropdownClose').click(function() {
            $('.dropdown-menu').hide();
            $('body').removeClass('notification-scroll');
          });
        });
    });

    var x = window.matchMedia("(max-width: 575px)")
    myFunction(x)
    x.addListener(myFunction)
</script>
<script>

  function handleNotificationClick(event, element) {
      event.preventDefault();
      const url = '{{ route('front.notification_status') }}';
      const type = $(element).data('type');
      const id = $(element).data('id');
      const redirectUrl = $(element).data('href');
      notificationStatus(url, type, id, redirectUrl);
  }

  function notificationStatus(url, type, id, redirectUrl) {
      event.preventDefault();
      $.ajax({
          url: url,
          type: 'POST',
          data: {
              type: type,
              quote_id: id,
              _token: '{{ csrf_token() }}'
          },
          success: function() {
              window.location.href = redirectUrl;
          },
          error: function(xhr) {
              console.error('Status update failed:', xhr);
          }
      });
  }

</script>
@yield('script')
</html>
