<?php $__env->startSection('content'); ?>
<div class="row wd-sl-rowmain">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-orange bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-orange p-3">
                            <h5 class="text-orange">Welcome Back !</h5>
                        </div>
                    </div>
                    <div class="col-5 align-self-end"> <img src="<?php echo e(URL::asset('/assets/images/profile-img.png')); ?>" alt="" class="img-fluid"> </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4"> <img src="<?php echo e(isset(Auth::user()->profile_image) ? asset(Auth::user()->profile_image) : asset('/assets/images/users/avatar-1.jpg')); ?>" alt="" class="img-thumbnail rounded-circle"> </div>
                        <h5 class="font-size-15 text-truncate"><?php echo e(ucfirst(@Auth::user()->name)); ?></h5>

                    </div>
                    <div class="col-sm-8">
                        <div class="pt-4">
                            <div class="row">

                            </div>
                            <div class="mt-4"> <a href="<?php echo e(route('admin.profile')); ?>" class="btn btn-orange waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card wd-sl-dashcard">
            <div class="card-body">
                <h5 class="mb-4">Total Users</h5>
                <h1><?php echo e(($counter['user']) ?? 0); ?></h1>
            </div>
        </div>
        <div class="card wd-sl-dashcard">
            <div class="card-body">
                <h5 class="mb-4">Total Car Transporter</h5>
                <h1><?php echo e(($counter['car_transporter']) ?? 0); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        
        <div class="card h-100">
                <div class="card-body">
                    <div id="container" style="width: 100%;">

                    </div>
                </div>
            </div>

    </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>


<script>
    Highcharts.getJSON(
        '<?php echo e(route("admin.totalusers")); ?>',
        function(data) {

            Highcharts.chart('container', {
                chart: {
                    zoomType: 'x'
                },
                title: {
                    text: 'Register Users'
                },
                subtitle: {
                    text: document.ontouchstart === undefined ?
                        'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
                },
                xAxis: {
                    type: 'datetime'
                },
                yAxis: {
                    title: {
                        text: 'Register Users'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    area: {
                        fillColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1
                            },
                            stops: [
                                [0, "white"],
                                [1, "white"]
                            ]
                        },
                        marker: {
                            radius: 2
                        },
                        lineWidth: 1,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        threshold: null
                    }
                },

                series: [{
                    type: 'area',
                    name: 'USERS',
                    data: data
                }]
            });
        }
    );
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/admin/general/dashboard.blade.php ENDPATH**/ ?>