@extends('layouts.master')
@section('title') @lang('translation.Data_Tables') @endsection
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('/assets/admin/vendors/general/datatable/jquery.dataTables.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.css" />
@endsection
@section('content')
@include('components.breadcum')
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
                            <!-- <th>Number</th> -->
                            <th>Type</th>
                            <th>Approval Status</th>
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
<div class="modal fade" id="approveUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recharge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="kt-form kt-form--label-right" id="frmContent" name="frmContent" action="javascript:void(0)" method="post">
                    @csrf
                    <!-- <input type="hidden" name="id" id="id" value="{{$data['id'] ?? 0}}"> -->
                    <input type="hidden" name="id" class="id" value="">
                    <div class="kt-portlet__body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Card status</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio kt-radio--bold kt-radio--success">
                                            <input type="radio" name="status" class="approved" value="approved" checked> Approved
                                            <span></span>
                                        </label>
                                        <label class="kt-radio kt-radio--bold kt-radio--danger">
                                            <input type="radio" name="status" class="rejected" value="rejected"> Rejected
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="submit btn btn-success">Save</button>
            </div>
            </form>
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
        $(document).on("change", ".status", function(e) {
            e.preventDefault();
            var is_status = $(this).val();
             var id= $(this).data('id');
          
            $.ajax({
                url: "{{ route('admin.carTransporter.status') }}",
                type: "POST",
                data: {
                    'is_status':is_status,
                    'id':id,
                },
                dataType: 'json',
                success: function(data) {
                    let msg = data.message;
                    if (data.status) {
                        show_toastr_notification(msg)
                       
                    } else {
                        show_toastr_notification(msg,412)
                    }
                    oTable.draw();
                },
            });

        })
        oTable = $('#listResults').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [
                [0, "DESC"]
            ],
            "ajax": "{{route('admin.carTransporter.pendinglisting')}}",
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
                    "data": "type",
                    sortable: true
                },
                {
                    "data": "is_status",
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
    });
</script>
@endsection