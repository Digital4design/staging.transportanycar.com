<?php $__env->startSection('content'); ?>

<?php echo $__env->make('components.breadcum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link href="<?php echo e(URL::asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.css"/>
<style>
    .w-200{
        width: 150px;
        height: 150px;
        margin-right: 10px;
        padding: 5px;
        border: 1px solid #c2c2c2;
    }
    .dataTables_wrapper {
        padding-top: 15px;
    }
</style>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="mb-2" style="border-left: 1px solid #5bc0de;padding:10px;"><h5 class="mb-0">Customer Details</h5></div>
                <div class="row mb-1">
                    <div class="col-md-3">Profile Image:</div>
                    <div class="col-md-9"><img src="<?php echo e($data->profile_image); ?>" alt ="user_image" style="width:50px;height:50px;"></div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3">Name:</div>
                    <div class="col-md-9"><?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?></div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3">Mobile:</div>
                    <div class="col-md-9"><?php echo e(($data->mobile) ? $data->country_code.' '.$data->mobile :  '-'); ?></div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3">Status:</div>
                    <div class="col-md-9"><?php echo user_status($data->status,$data->deleted_at); ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Pending</button>
                      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Approved</button>
                      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-ongoing" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">OnGoing</button>
                      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-completed" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Completed</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <table id="pending_listResults" class="table table-responsive dt-responsive mb-4  nowrap w-100 mb-">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pickup</th>
                                <th>Drop</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <table id="approved_listResults" class="table dt-responsive mb-4  nowrap w-100 mb-">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pickup</th>
                                <th>Drop</th>  
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-ongoing" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <table id="ongoing_listResults" class="table dt-responsive mb-4  nowrap w-100 mb-">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pickup</th>
                                <th>Drop</th>  
                                <th>Price</th>
                                <th>Transporter Name</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody></tbody>

                    </table>
                </div>
                <div class="tab-pane fade" id="nav-completed" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <table id="completed_listResults" class="table dt-responsive mb-4  nowrap w-100 mb-">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pickup</th>
                                <th>Drop</th>  
                                <th>Price</th>
                                <th>Transporter Name</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody></tbody>
                        
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <table id="cancelled_listResults" class="table dt-responsive mb-4  nowrap w-100 mb-">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pickup</th>
                                <th>Drop</th> 
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody></tbody>
                        
                    </table>
                </div>
               
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        oTable = $('#pending_listResults').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "DESC"]
            ],
            "ajax": {
                url: "<?php echo e(route('admin.user.pending_list',$data->id)); ?>",
                // data: function (d) {
                //     d.type = $('#referral_type').val()
                // }
            },
            "columns": [{
                    "data": "id",
                    searchable: false,
                    sortable: false
                },
                {
                    "data": "pickup_postcode",
                    sortable: false
                },
                {
                    "data": "drop_postcode",
                    sortable: false
                },
                {
                    "data": "action",
                    sortable: false
                },
               
               
            ]
        });


        approvedTable = $('#approved_listResults').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "DESC"]
            ],
            "ajax": {
                url: "<?php echo e(route('admin.user.approved_list',$data->id)); ?>",
                // data: function (d) {
                //     d.type = $('#referral_type').val()
                // }
            },
            "columns": [{
                    "data": "id",
                    searchable: false,
                    sortable: false
                },
                {
                    "data": "pickup_postcode",
                    sortable: false
                },
                {
                    "data": "drop_postcode",
                    sortable: false
                },
                {
                    "data": "action",
                    sortable: false
                }
                
               
               
            ]
        });

        ongoingTable = $('#ongoing_listResults').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "DESC"]
            ],
            "ajax": {
                url: "<?php echo e(route('admin.user.ongoing_list',$data->id)); ?>",
                // data: function (d) {
                //     d.type = $('#referral_type').val()
                // }
            },
            "columns": [{
                    "data": "id",
                    searchable: false,
                    sortable: false
                },
                {
                    "data": "pickup_postcode",
                    sortable: false
                },
                {
                    "data": "drop_postcode",
                    sortable: false
                },
               {
                    "data": "price",
                    sortable: false
                },
                {
                    "data": "transporter_name",
                    sortable: false
                },
                {
                    "data": "action",
                    sortable: false
                },
               
               
            ]
        });

        completedTable = $('#completed_listResults').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "DESC"]
            ],
            "ajax": {
                url: "<?php echo e(route('admin.user.completed_list',$data->id)); ?>",
                // data: function (d) {
                //     d.type = $('#referral_type').val()
                // }
            },
            "columns": [{
                    "data": "id",
                    searchable: false,
                    sortable: false
                },
                {
                    "data": "pickup_postcode",
                    sortable: false
                },
                {
                    "data": "drop_postcode",
                    sortable: false
                },
                {
                    "data": "price",
                    sortable: false
                },
                {
                    "data": "transporter_name",
                    sortable: false
                },
                {
                    "data": "action",
                    sortable: false
                },
               
               
            ]
        });

        cancelledTable = $('#cancelled_listResults').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "DESC"]
            ],
            "ajax": {
                url: "<?php echo e(route('admin.user.completed_list',$data->id)); ?>",
                // data: function (d) {
                //     d.type = $('#referral_type').val()
                // }
            },
            "columns": [{
                    "data": "id",
                    searchable: false,
                    sortable: false
                },
                {
                    "data": "pickup_postcode",
                    sortable: false
                },
                {
                    "data": "drop_postcode",
                    sortable: false
                },
                {
                    "data": "action",
                    sortable: false
                },
               
               
            ]
        });
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/admin/user/view.blade.php ENDPATH**/ ?>