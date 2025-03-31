<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Data_Tables'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<!-- DataTables -->
<link href="<?php echo e(URL::asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('components.breadcum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <?php echo success_error_view_generator(); ?>

    </div>
    <div class="card">
        <div class="card-body">
            <div class="mb-2 text-right">
                <!-- <a href="<?php echo e(route('admin.carTransporter.create')); ?>" class="btn btn-orange">Add</a> -->
            </div>
            <div class="mb-2 text-right wd-sl-modalbtn">
                <button id="exportButton" class="btn btn-orange waves-effect waves-light">Export Transporters</button>
            </div>
            <div class="table-responsive ">
                <table id="listResults" class="table dt-responsive mb-4  nowrap w-100 mb-">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Profile Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <!-- <th>Number</th> -->
                            <th>Type</th>
                            <th>Status</th>
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
<!-- Required datatable js -->
<script src="<?php echo e(asset('/assets/admin/vendors/general/validate/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.2/xlsx.full.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        oTable = $('#listResults').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "DESC"]
            ],
            "ajax": "<?php echo e(route('admin.carTransporter.approvedlisting')); ?>",
            "columns": [{
                    "data": "id",
                    searchable: false,
                    sortable: false
                },
                {
                    "data": "profile_image",
                    searchable: false,
                    sortable: false
                },
                {
                    "data": "name",
                    sortable: true
                },
                // {"data": "username", sortable: false},
                {
                    "data": "email",
                    sortable: true
                },
                // {
                //     "data": "mobile_number",
                //     sortable: true
                // },
                {
                    "data": "type",
                    sortable: true
                },
                
                {
                    "data": "status",
                    searchable: false,
                    sortable: false
                },
                {
                    "data": "action",
                    searchable: false,
                    sortable: false
                }
            ]
        });

        $('#exportButton').on('click', function() {
            // Get the table data
            var table = $('#listResults').DataTable();
            var data = table.rows({ search: 'applied' }).data().toArray(); // Get filtered rows

            // Prepare the data for SheetJS export
            var ws_data = [];
            var headers = ["No", "Name","company name","username","mobile number", "email", "total bids", "total jobs won","member since date"];
            ws_data.push(headers);

            // Loop through the data and format it for export
            data.forEach(function(row) {
                var rowData = [
                    row.id,  // No
                    row.name,  // Name
                    row.company_name,
                    row.username,
                    row.mobile_number,  // Email
                    row.email,
                    row.total_bids,
                    row.total_jobs_won,
                    row.member_since,
                    
                ];
                ws_data.push(rowData);
            });

            // Create a workbook and add the worksheet
            var ws = XLSX.utils.aoa_to_sheet(ws_data);
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Transporters");

            // Export the workbook as an Excel file
            XLSX.writeFile(wb, 'car_transporters.xlsx');
        });
    });
  
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/public_html/resources/views/admin/carTransporter/approved_view.blade.php ENDPATH**/ ?>