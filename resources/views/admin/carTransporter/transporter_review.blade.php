@extends('layouts.master')
@section('title') @lang('translation.Data_Tables') @endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.css"/>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">  Review</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  
                 </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        {!! success_error_view_generator() !!}
    </div>
    <div class="card">
        <div class="card-body">
            <div class="mb-2 text-right">
                <!-- <a href="{{route('admin.carTransporter.create')}}" class="btn btn-orange">Add</a> -->
            </div>
            <div class="table-responsive ">
                <table id="listResults" class="table dt-responsive mb-4  nowrap w-100 mb-">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Profile Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Review</th>
                            <th>Job completed</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- Required datatable js -->
<script src="{{asset('/assets/admin/vendors/general/validate/jquery.validate.min.js')}}"></script>
<script src="{{asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
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
            "ajax": "{{route('admin.carTransporter.review_data')}}",
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
                
                {
                    "data": "review",
                    sortable: true
                },
                {
                    "data": "completed_job",
                    sortable: true
                },
                
                {
                    "data": "action",
                    searchable: false,
                    sortable: false
                }
            ]
        });
    });
</script>
@endsection
