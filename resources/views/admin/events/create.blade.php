@extends('layouts.master')

@section('content')
@section('title')
@lang('translation.Form_Layouts')
@endsection @section('content')
@include('components.breadcum')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.css"/>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    .image-container {
        position: relative;
        display: inline-block;
    }

    .delete-icon {
        position: absolute;
        top: 5px;
        right: 5px;
        display: none;
        color: red;
        font-size: 20px;
        cursor: pointer;
    }

    .image-container:hover .delete-icon {
        display: block;
    }
    .remove-button, .myremove{
        width: 20% !important;
    }
    .add_button{
        width: 6% !important;
    }


</style>
<div class="row">
    <div class="col-12">
    </div>
    <div class="card">
        <div class="card-body">
            @if(isset($data) && !empty($data))
            <form class="" name="main_form" id="main_form" method="post" action="{{route('admin.events.update',$data->id)}}" enctype="multipart/form-data">
                @method('PATCH')
            @else
            <form class="" name="main_form" id="main_form" method="post" action="{{route('admin.events.store')}}" enctype="multipart/form-data">
            @endif
                 {!! get_error_html($errors) !!}
                @csrf
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>Title</label>
                    <div class="col-md-10">
                        <input type="text" name="title" id="title" class="form-control" value="{{($data->title) ?? ''}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>Category</label>
                    <div class="col-md-10">
                        <select class="form-control" id="cat_id" name="cat_id">
                            @foreach ($categories as $category)
                            <?php
                            $selected=isset($data)?($data->cat_id==$category->id)?"selected=selected":"":"";
                            ?>
                                <option value="{{$category->id}}" {{$selected}}>{{$category->category_title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>Description</label>
                    <div class="col-md-10">
                       <textarea name="description" id="description" class="form-control">{{($data->description) ?? ''}}</textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>Km</label>
                    <div class="col-md-10">
                        <input type="number" name="km" id="km" class="form-control" value="{{($data->km) ?? ''}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>Date</label>
                    <div class="col-md-10">
                        <input type="datetime-local" id="datetimepicker" name="event_start_date_time" class="form-control" value="{{($data->event_start_date_time) ?? ''}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>Start Location</label>
                    <div class="col-md-10">

                        <input type="text" id="autocomplete" name="location" placeholder="Enter a location" class="form-control" value="{{($data->location) ?? ''}}">
                        <input type="hidden" id="latitude" name="location_start_lat" value="{{($data->location_start_lat) ?? ''}}">
                        <input type="hidden" id="longitude" name="location_start_long" value="{{($data->location_start_long) ?? ''}}">

                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>End Location</label>
                    <div class="col-md-10">

                        <input type="text" id="autocomplete2" name="end_location" placeholder="Enter a location" class="form-control" value="{{($data->end_location) ?? ''}}">
                        <input type="hidden" id="latitude1" name="location_end_lat" value="{{($data->location_end_lat) ?? ''}}">
                        <input type="hidden" id="longitude1" name="location_end_long" value="{{($data->location_end_long) ?? ''}}">

                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label"><span class="text-danger">*</span>Images</label>
                    <div class="col-md-10">
                        @if(isset($data))
                        <div class="mb-2">
                            @foreach ($data->event_images as $eI)
                            <div class="image-container">
                              <img src="{{$eI->event_image_path}}" width="100" height="100"/>
                              <a href="{{ route('admin.events.delete_images', $eI->id) }}" class="delete-icon">&times;</a>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <div class="mb-2">
                            <button type="button" class="btn btn-sm btn-success" onclick="addFileInput()">+</button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="removeFileInput()">-</button>
                        </div>
                        <div id="file-container">
                            <input type="file" class="form-control" name="files[]">
                        </div>

                    </div>
                </div>

                <!--new edit start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Routes Check Points</h4>
                                {{-- <form action="{{ route('admin.plan.update_plan') }}" method="POST">
                                @csrf --}}
                                    <div class="repeater">
                                            @if(count($checkPoints))
                                            @foreach($checkPoints as $index=>$value)
                                                <div class="repeater-item row">
                                                    <input type="hidden" name="items[{{ $index }}][id]" value="{{ $value['id'] }}">
                                                    <div  class="mb-3 col-lg-8">
                                                        <label for="check_point">Check Point</label>
                                                        <input type="text" id="check_point" name="items[{{ $index }}][check_point]" class="form-control check_point place-input" value="{{$value->check_point_name}}"/>
                                                        <input type="hidden" class="check_point_start_lat"  name="items[{{ $index }}][check_point_start_lat]" value="{{$value->check_point_lat}}">
                                                        <input type="hidden" class="check_point_start_long" name="items[{{ $index }}][check_point_start_long]" value="{{$value->check_point_long}}">
                                                    </div>

                                                    <div class="col-lg-2 align-self-center">
                                                        <div class="d-grid">
                                                            <input type="button" class="remove-button btn btn-danger btn-sm" value="-">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @endif

                                    </div>
                                    {{-- <button type="submit" class="btn btn-success">Save</button>
                                </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!--new edit start -->

                <!-- dynamic part start -->
                <div class="mb-3 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <h4 class="card-title mb-4">Routes Check Points</h4> --}}
                                <div class="repeater">
                                    <div data-repeater-list="group-a">
                                        <div data-repeater-item class="row">
                                            <div  class="mb-3 col-lg-8">
                                                <label for="check_point">Check Point</label>
                                                <input type="text" id="check_point" name="check_point" class="form-control check_point place-input"/>
                                                <input type="hidden" class="check_point_start_lat"  name="check_point_start_lat" value="{{($data->check_point_start_lat) ?? ''}}">
                                                <input type="hidden" class="check_point_start_long" name="check_point_start_long" value="{{($data->check_point_start_long) ?? ''}}">
                                            </div>

                                            <div class="col-lg-2 align-self-center">
                                                <div class="d-grid">
                                                    <input data-repeater-delete type="button" class="btn btn-danger btn-sm myremove" value="-"/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <input data-repeater-create type="button" class="btn btn-success mt-3 btn-sm add-button add_button" value="+"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- dynamic part ends -->



                <div class="kt-portlet__foot">
                    <div class=" ">
                        <div class="row">
                            <div class="wd-sl-modalbtn">
                                <button  type="submit" class="btn btn-orange waves-effect waves-light" id="save_changes">Submit</button>
                                <a href="{{route('admin.categories.index')}}" id="close"><button type="button" class="btn btn-outline-secondary waves-effect">Cancel</button></a>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/utils.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1MjB-QzoalneW1cJiPRIe7eKXxmjt318&libraries=places"></script> --}}
    <script src="{{asset('assets/js/pages/jquery.repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/form-repeater.int.js')}}"></script>

<script>
    const removeButtons = document.querySelectorAll('.remove-button');
    const repeaterItems = document.querySelectorAll('.repeater-item');
    removeButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            repeaterItems[index].remove().fadeOut();
        });
    });
    function addFileInput() {
        var fileContainer = document.getElementById('file-container');
        var newInput = document.createElement('input');
        newInput.type = 'file';
        newInput.className ='form-control mt-2';
        newInput.name = 'files[]';
        fileContainer.appendChild(newInput);
    }

    function removeFileInput() {
        var fileContainer = document.getElementById('file-container');
        var fileInputs = fileContainer.getElementsByTagName('input');
        if (fileInputs.length > 1) {
        fileContainer.removeChild(fileInputs[fileInputs.length - 1]);
        }
    }
    function initPlaceAutocomplete(inputElement) {
        var autocomplete = new google.maps.places.Autocomplete(inputElement);
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }
            $(inputElement).parent().find(".check_point_start_lat").val(place.geometry.location.lat());
            $(inputElement).parent().find(".check_point_start_long").val(place.geometry.location.lng()) ;
            // $(".check_point_start_lat").val("abc");
            // console.log($(inputElement).parent().find(".check_point_start_long"));
        });
    }
    function initialize() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();

            if (!place.geometry) {
                return;
            }

            document.getElementById('latitude').value = place.geometry.location.lat();
            document.getElementById('longitude').value = place.geometry.location.lng();
        });




    }
    google.maps.event.addDomListener(window, 'load', initialize);


    function initialize2() {
        var input1 = document.getElementById('autocomplete2');
        var autocomplete2 = new google.maps.places.Autocomplete(input1);

        autocomplete2.addListener('place_changed', function() {
        var place2 = autocomplete2.getPlace();

        if (!place2.geometry) {
            return;
        }

        document.getElementById('latitude1').value = place2.geometry.location.lat();
        document.getElementById('longitude1').value = place2.geometry.location.lng();
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize2);
    $(function () {

        $("#main_form").validate({
            rules: {
                title: {required: true},
            },
            messages: {
                title: {required: "Please Enter Title"},
            },
            submitHandler: function (form) {
                addOverlay();
                form.submit();
            }
        });
                // var input2=document.getElementsByClassName('check_point');
                // autocomplete3 = new google.maps.places.Autocomplete(input2);
                // autocomplete3.addListener('place_changed', function() {
                //     var place3 = autocomplete3.getPlace();

                //     if (!place3.geometry) {
                //         return;
                //     }

                //     input2.closest('.check_point_start_lat').value = place3.geometry.location.lat();
                //     input2.closest('.check_point_start_long').value = place3.geometry.location.lng();
                //     //document.getElementById('longitude1').value = place3.geometry.location.lng();
                // });
        var init=document.getElementById('check_point');
        initPlaceAutocomplete(init);
            var input2=document.getElementsByClassName('check_point');
            for (i = 0; i < input2.length; i++) {
                initPlaceAutocomplete(input2[i]);
                google.maps.event.addDomListener(window, 'load', initPlaceAutocomplete);
            }
        $(document).on("click", ".add-button", function() {
            var newItem = $(".repeater-item:last-child").clone();
            newItem.appendTo(".form-repeater");
            var input2=document.getElementsByClassName('check_point');
            for (i = 0; i < input2.length; i++) {
                initPlaceAutocomplete(input2[i]);
                google.maps.event.addDomListener(window, 'load', initPlaceAutocomplete);
            }

        });
    });
    </script>
@endsection
