<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no, address=no" />
    <title><?php echo e(print_title(site_name) . ' | '); ?><?php echo e(isset($title) ? print_title($title) : ''); ?></title>
    <!-- Favicon [ 16*16 SVG ]-->
    <link href="<?php echo e(asset('/assets/images/favicon.png')); ?>" rel="icon" class="favicon">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Bootstrap  CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/web/vendors/bootstrap/css/bootstrap.min.css')); ?>">
    <!-- Custome CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/web/css/header_footer.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/web/css/style.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/web/css/responsive.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/web/css/admin.css')); ?>" />
    <link href="<?php echo e(asset('assets/admin/vendors/general/toastr/build/toastr.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <?php echo $__env->yieldContent('head_css'); ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16465579063"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-16465579063');
    </script>
    <script>
        (function(w, d, t, r, u) {
            var f, n, i;
            w[u] = w[u] || [], f = function() {
                    var o = {
                        ti: "187133723",
                        enableAutoSpaTracking: true
                    };
                    o.q = w[u], w[u] = new UET(o), w[u].push("pageLoad")
                },
                n = d.createElement(t), n.src = r, n.async = 1, n.onload = n.onreadystatechange = function() {
                    var s = this.readyState;
                    s && s !== "loaded" && s !== "complete" || (f(), n.onload = n.onreadystatechange = null)
                },
                i = d.getElementsByTagName(t)[0], i.parentNode.insertBefore(n, i)
        })
        (window, document, "script", "//bat.bing.com/bat.js", "uetq");
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
</head>

<body style="background: #FDFFFA;">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-572LPM3G"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <?php echo $__env->yieldContent('content'); ?>
</body>
<!-- Bootstrap JS & Jquery -->
<script src="<?php echo e(asset('assets/web/vendors/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/web/vendors/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/vendors/general/toastr/build/toastr.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $(function() {
        <?php if(session('error')): ?>
            toastr.error('<?php echo e(session('error')); ?>', '', {
                timeOut: 2000
            });
        <?php elseif(session('success')): ?>
            toastr.success('<?php echo e(session('success')); ?>', '', {
                timeOut: 2000
            });
        <?php endif; ?>
    });
</script>
<script src="<?php echo e(asset('/assets/admin/vendors/general/validate/jquery.validate.min.js')); ?>"></script>
<script>
    function addOverlay() {
        $('#loader_display_d').show();
    }

    function removeOverlay() {
        $('#loader_display_d').hide();
    }
</script>
<?php echo $__env->yieldContent('script'); ?>

</html>
<?php /**PATH /var/www/html/public_html/resources/views/layouts/web/app.blade.php ENDPATH**/ ?>