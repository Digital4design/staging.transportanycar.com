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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/header_footer.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/responsive.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/admin.css')}}" />
    <link href="{{asset('assets/admin/vendors/general/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    
    @yield('head_css')
  <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16465579063"></script> 
  <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-16465579063'); </script>
  <script>
    (function(w,d,t,r,u)
    {
      var f,n,i;
      w[u]=w[u]||[],f=function()
      {
        var o={ti:"187133723", enableAutoSpaTracking: true};
        o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")
      },
      n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function()
      {
        var s=this.readyState;
        s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)
      },
      i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)
    })
    (window,document,"script","//bat.bing.com/bat.js","uetq");
  </script>
   <script>
      window.uetq = window.uetq || [];
      window.uetq.push("event", "submit_lead_form", {});
    </script>
    <script>
      function uet_report_conversion() {
        window.uetq = window.uetq || [];
        window.uetq.push("event", "submit_lead_form", {});
      }
    </script>
</head>
<body style="background: #FDFFFA;">
@yield('content')
</body>
<!-- Bootstrap JS & Jquery -->
<script src="{{asset('assets/web/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/web/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/general/toastr/build/toastr.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
<script>
    function addOverlay() {
        $('#loader_display_d').show();
    }
    function removeOverlay() {
        $('#loader_display_d').hide();
    }
</script>
@yield('script')
</html>
