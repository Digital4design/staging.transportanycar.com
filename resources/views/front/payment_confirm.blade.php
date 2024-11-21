@extends('layouts.web.app')
{{-- @extends('layouts.web.dashboard.app') --}}


@section('head_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
@endsection
<style>
    main,
    .admin-header {
        padding:0!important;
    }
.error{
  font-size: 14px;
  color: red;
  padding: 3px 0px;
  margin-bottom: 0;
  text-align:left;
}
.iti {
    margin-bottom: 0 !important;
}
.iti--allow-dropdown .iti__flag-container, .iti--separate-dial-code .iti__flag-container {
    height: 49px;
}
.form_group_sec {
    position: relative;
    margin-bottom: 15px;
}
.form_group_sec .form-control {
    margin-bottom: 0 !important;
}
.payment_confirm_main > .container {
    padding: 0 5px;
}
.payment_confirm_main .payment_confirm_blog {
    padding: 20px 15px 46px;
}
.search_add label {
    position: absolute;
    background: #fff;
    font-size: 14px;
    color: #4f4f4f;
    font-weight: 300;
    top: -12px;
    left: 12px;
    padding: 2px 5px;
}
.form_group_sec.search_add {
    margin-top: 5px;
}
span.search_svg_icon {
    position: absolute;
    right: 12px;
    top: 14px;
}
.form_group_sec.search_add input#start_point,
.form_group_sec.search_add input#end_point {
    padding-right: 40px;
}
ul.suggestions-list {
    border: 1px solid #ccc;
    border-radius: 4px;
    border-top: 0;
}
.suggestion-scroll{
    max-height: 418px;
    overflow: auto;
    
}
ul.suggestions-list li {
    margin: 8px 0;
    padding: 4px 10px;
    color: #000;
    opacity: 1;
    white-space: normal;
}


@media screen and (max-width: 991px) {
    header.admin-header .admin-menu {display: none;}
    header.admin-header .navbar .brand img {height: auto; max-width: 190px; width: 100%;}
    header.admin-header .navbar {
        padding: 30px 0px;
    }
    header.admin-header {
        background: linear-gradient(180deg, rgba(0, 141, 212, 0.31) 0%, rgba(245, 251, 254, 0) 100%);
        position: relative;        
        box-shadow: none;
    }
    .admin-header .navbar #nav:checked~.wrapper .menu {
        padding: 0;
        box-shadow: none;
    }
    .admin-header .navbar .wrapper .menu-item {
        padding: 0 0 15px;
    }
    .admin-header .navbar #nav:checked~.wrapper .menu {
        box-shadow: none;
    }
    .admin-header .navbar .wrapper .menu-item a {
        padding: 6px 23px!important;
        font-size: 15px;
        font-weight: 400;
        max-width: initial;
        border: none;
        border-radius: 0;
        white-space: nowrap;
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }
    .admin-header .navbar .wrapper .menu-item:nth-child(2) a {margin-top: 0;}
}
</style>

@section('content')
    {{-- @include('layouts.web.head-web-menu-without-mobile') --}}
    @include('layouts.web.dashboard.header')

    <main>
        <section class="join_network_main payment_confirm_main">
            <div class="container">
                <div class="position-relative text-center">
                    <h1 class="banner_newtext d-block text-center">Thank you</h1>
                    <p class="peratag peratag_br"> Your deposit payment of £{{ $deposit }} has been successful! <br /> Booking reference: {{ $delivery_reference_id }} </p>
                    <p class="peratag mt-0">Please enter the details below so we can forward them onto {{ $transporter_name }} <br /> and they will be in touch to organise the collection.</p>
                </div>
                <form action="javascript:void(0)" class="payment_confirm_blog" id="payment_confirm_form">
                    @csrf
                    <input type="hidden" name="transaction_id" value="{{ $transaction_id }}">
                    <input type="hidden" name="delivery_reference_id" value="{{ $delivery_reference_id }}">
                    <input type="hidden" name="user_quote_id" value="{{ $quoteId }}">
                    <input type="hidden" name="quote_by_transporter_id" value="{{ $quote_by_transporter_id }}" >
                    <div class="signnetwork box_width_custom">
                        <h6>Collection details</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form_group_sec">
                                    <input type="text" id="contact_name" name="contact_name"  placeholder="Contact name" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group_sec">
                                    <input id="phone" name="phone" type="tel" placeholder="Mobile number" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group_sec">
                                    <input type="email" id="email" name="email" placeholder="Email address" class="form-control" value="{{ $user_email }}" />
                                </div>
                            </div>
                            <div class="col-lg-6 manuall-add">
                                <div class="form_group_sec search_add">
                                    <label>Search address</label>
                                    <input type="text" class="form-control" placeholder="Start typing your address" id="start_point" oninput="getAddresses(this.value, 'start')" name="start_point"/>
                                    <span class="search_svg_icon">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1 9.1361C0.999414 5.25551 3.74015 1.91492 7.54607 1.15732C11.352 0.399723 15.1631 2.43613 16.6486 6.02113C18.1341 9.60613 16.8802 13.7412 13.6539 15.8976C10.4276 18.0539 6.12731 17.6308 3.38303 14.8871C1.8574 13.362 1.00018 11.2933 1 9.1361Z" stroke="black" stroke-width="1.98586" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M14.8828 14.8887L19.531 19.5369" stroke="black" stroke-width="1.98586" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                    <div class="suggestion-scroll">
                                        <ul id="start-suggestions-list" class="suggestions-list d-none"></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 manuall-add">
                                <div class="form-group">
                                    <a href="javascript:;" id="pay_address" class="manual_link d-inline-block">Enter address manually</a>
                                </div>
                            </div>
                        </div>
                        <!-- add address manually start -->
                        <div class="address_block add1" style="display: none;">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form_group_sec">
                                        <input type="text" id="collection_address_1" name="collection_address_1" placeholder="Address line 1" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_group_sec">
                                        <input type="text" id="collection_address_2" name="collection_address_2" placeholder="Address line 2 (optional)" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_group_sec">
                                        <input type="text" id="collection_town" name="collection_town" placeholder="Town" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_group_sec">
                                        <input type="text" id="collection_country" name="collection_country" placeholder="County" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <a href="javascript:;" id="try_address" class="manual_link d-inline-block">Try address search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- add address manually end -->
                        <h6>Delivery details</h6>
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="form_group_sec">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Use same contact details as above.</label>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group_sec">
                                    <input type="text" id="delivery_contact_name" name="delivery_contact_name" placeholder="Contact name" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group_sec">
                                    <input id="contact_number" name ="contact_number" type="tel" placeholder="Mobile number" class="form-control" />
                                </div>
                            </div>

                            
                            <div class="col-lg-6">
                                <div class="form_group_sec">
                                    <input type="email" id="delivery_email" name="delivery_email" placeholder="Email address" class="form-control"  value="{{ $user_email }}"/>
                                </div>
                            </div>
                            <div class="col-lg-6 manuall-add2">
                                <div class="form_group_sec search_add">
                                    <label>Search address</label>
                                    <input type="text" class="form-control" placeholder="Start typing your address" id="end_point" oninput="getAddresses(this.value, 'end')" name="end_point"/>
                                    <span class="search_svg_icon">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1 9.1361C0.999414 5.25551 3.74015 1.91492 7.54607 1.15732C11.352 0.399723 15.1631 2.43613 16.6486 6.02113C18.1341 9.60613 16.8802 13.7412 13.6539 15.8976C10.4276 18.0539 6.12731 17.6308 3.38303 14.8871C1.8574 13.362 1.00018 11.2933 1 9.1361Z" stroke="black" stroke-width="1.98586" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M14.8828 14.8887L19.531 19.5369" stroke="black" stroke-width="1.98586" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                    <div class="suggestion-scroll">
                                        <ul id="end-suggestions-list" class="suggestions-list d-none"></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 manuall-add2">
                                <div class="form-group">
                                    <a href="javascript:;" id="pay_address1" class="manual_link d-inline-block">Enter address manually</a>
                                </div>
                            </div>
                        </div>
                        <!-- add address manually start -->
                        <div class="address_block add2" style="display: none;">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form_group_sec">
                                        <input type="text" id="delivery_address_1" name = "delivery_address_1" placeholder="Address line 1" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_group_sec">
                                        <input type="text" id="delivery_address_2" name = "delivery_address_2" placeholder="Address line 2 (optional)" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_group_sec">
                                        <input type="text" id="delivery_town" name = "delivery_town" placeholder="Town" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_group_sec">
                                        <input type="text" id="delivery_country" name="delivery_country" placeholder="County" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <a href="javascript:;" id="try_address2" class="manual_link d-inline-block">Try address search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- add address manually end -->
                    </div>
                    <div class="btngroup">
                        <button class="getqt_btnincld">Continue 
                            <svg width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.4848 1.62323L8.35854 8.49696L1.4848 15.3707" stroke="white" stroke-width="2.06212" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                        <div id="form_message"></div>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
    <script src="{{asset('assets/web/js/main.js')}}"></script>
    <script>
        $(document).ready(function() {
            $("#payment_confirm_form").validate({
                rules: {
                    contact_name: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    start_point: {
                        required: function() {
                            return !$(".add1").is(":visible");
                        }
                    },
                    end_point: {
                        required: function() {
                            return !$(".add2").is(":visible");
                        }
                    },
                    delivery_contact_name: {
                        required: true
                    },
                    contact_number: {
                        required: true,
                        digits: true,
                        minlength: 11,
                        maxlength: 11
                    },
                    delivery_email: {
                        required: true,
                        email: true
                    },
                    collection_address_1: {
                        required: function() {
                            return $(".add1").is(":visible");
                        }
                    },
                    collection_town: {
                        required: function() {
                            return $(".add1").is(":visible");
                        }
                    },
                    collection_country: {
                        required: function() {
                            return $(".add1").is(":visible");
                        }
                    },
                    delivery_address_1: {
                        required: function() {
                            return $(".add2").is(":visible");
                        }
                    },
                    delivery_town: {
                        required: function() {
                            return $(".add2").is(":visible");
                        }
                    },
                    delivery_country: {
                        required: function() {
                            return $(".add2").is(":visible");
                        }
                    }
                },
                messages: {
                    contact_name: "Please enter contact name",
                    phone: "Please enter mobile number",
                    email: {
                        required: "Please enter email address",
                        email: "Please enter a valid email address"
                    },
                    start_point: "Please enter collection address",
                    end_point: "Please enter delivery address",
                    delivery_contact_name: "Please enter delivery contact name",
                    contact_number: {
                        required: "Please enter delivery mobile number",
                        maxlength: "Please enter a valid mobile number",
                        minlength:"Please enter a valid mobile number"
                    },
                    delivery_email: {
                        required: "Please enter delivery email address",
                        email: "Please enter a valid delivery email address"
                    },
                    collection_address_1: "Please enter address line 1",
                    collection_town: "Please enter town",
                    collection_country: "Please enter county",
                    delivery_address_1: "Please enter address line 1",
                    delivery_town: "Please enter town",
                    delivery_country: "Please enter county"
                }
            });

            $(".getqt_btnincld").click(function(e) {
                e.preventDefault(); // Prevent default form submission
                $('.getqt_btnincld').prop('disabled', true);
                if ($("#payment_confirm_form").valid()) {
                    var formData = $("#payment_confirm_form").serialize();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('front.quote_detail_save') }}",
                        data: formData,
                        dataType: "json",
                        success: function(response) {
                            if(response.success) {
                                // Construct the redirect URL with the response.id
                                var url = "{{ route('front.user_deposit', ['id' => ':response_id']) }}";
                                url = url.replace(':response_id', response.quote_by_transporter_id);
                                window.location.href = url;
                            } else {
                                $('.getqt_btnincld').prop('disabled', false);
                                $('#form_message').text(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            $('.getqt_btnincld').prop('disabled', false);
                            console.error(xhr.responseText);
                            // Optionally, show error message to user
                        }
                    });
                }
            });

            // const input = document.querySelector("#phone");
            // window.intlTelInput(input, {
            //     initialCountry: 'gb',
            //     utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
            //     separateDialCode: true
            // });
            const contact_number = document.querySelector("#contact_number");
            // window.intlTelInput(contact_number, {
            //     initialCountry: 'gb',
            //     utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
            //     separateDialCode: true
            // });
            // Toggle and validate manual address for collection
            $("#pay_address").click(function() {
                clearStartPoint();
                $('.manuall-add').addClass('hidden')
                $(".add1").toggle();
                if ($(".add1").is(":visible")) {
                    $("#start_point").rules("remove", "required");
                    $(".add1 input").each(function() {
                        if ($(this).attr('name') !== 'collection_address_2') {
                            $(this).rules("add", {
                                required: true,
                                messages: {
                                    required: "Please enter " + $(this).attr("placeholder").toLowerCase()
                                }
                            });
                        }
                    });
                } else {
                    $("#start_point").rules("add", {
                        required: true,
                        messages: {
                            required: "Please enter your start address"
                        }
                    });
                    $(".add1 input").each(function() {
                        $(this).rules("remove", "required");
                    });
                }
            });

            // Toggle and validate manual address for delivery
            $("#pay_address1").click(function() {
                $('.manuall-add2').addClass('hidden')
                $(".add2").toggle();
                clearEndPoint();
                if ($(".add2").is(":visible")) {
                    $("#end_point").rules("remove", "required");
                    $(".add2 input").each(function() {
                        if ($(this).attr('name') !== 'delivery_address_2') {
                            $(this).rules("add", {
                                required: true,
                                messages: {
                                    required: "Please enter " + $(this).attr("placeholder").toLowerCase()
                                }
                            });
                        }
                    });
                } else {
                    $("#end_point").rules("add", {
                        required: true,
                        messages: {
                            required: "Please enter your end address"
                        }
                    });
                    $(".add2 input").each(function() {
                        $(this).rules("remove", "required");
                    });
                }
            });

            $('#try_address').click(function() {
                $('.manuall-add').toggle();
                $(".add1").toggle();
                clearManualAddress();
            });

            function clearManualAddress() {
                $('#collection_address_1').val('');
                $('#collection_address_2').val('');
                $('#collection_town').val('');
                $('#collection_country').val('');
            }

            function clearManualDeliveryAddress() {
                $('#delivery_address_1').val('');
                $('#delivery_address_2').val('');
                $('#delivery_town').val('');
                $('#delivery_country').val('');
            }

            function clearStartPoint() {
                $('#start_point').val('');
            }

            function clearEndPoint() {
                $('#end_point').val('');
            }

            $('#try_address2').click(function() {
                $('.manuall-add2').removeClass('hidden');
                $(".add2").toggle();
                clearManualDeliveryAddress();
            });

            $("#exampleCheck1").click(function() {
                if ($(this).is(":checked")) {
                    $("#delivery_contact_name").val($("#contact_name").val());
                    $("#contact_number").val($("#phone").val());
                    $("#delivery_email").val($("#email").val());
                } else {
                    $("#delivery_contact_name").val('');
                    $("#contact_number").val('');
                    $("#delivery_email").val('');
                }
            });
        });
    </script>
    <script>
        const api_key = '_S3UXVi3XkuVon-_WONZ5Q41730';

        function getAddresses(textInput, type) {
            const suggestionsList = document.getElementById(`${type}-suggestions-list`);
            if (!textInput.trim()) {
                suggestionsList.innerHTML = '';
                suggestionsList.classList.add('hidden');
                return;
            }

            const api_url = `https://api.getaddress.io/autocomplete/${textInput}?api-key=${api_key}&all=true`;

            fetch(api_url)
                .then(response => response.json())
                .then(data => {
                    $('ul.suggestions-list').removeClass('d-none');
                    displaySuggestions(data.suggestions, suggestionsList, type);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function displaySuggestions(suggestions, suggestionsList, type) {
            suggestionsList.innerHTML = '';

            suggestions.forEach(suggestion => {
                const listItem = document.createElement('li');
                listItem.textContent = suggestion.address;
                listItem.classList.add('dropdown-item');
                listItem.setAttribute('data-id', suggestion.id);
                listItem.onclick = () => fetchCompleteAddress(suggestion.id, suggestion.address, type);
                suggestionsList.appendChild(listItem);
            });

            suggestionsList.classList.remove('hidden');
        }

        function fetchCompleteAddress(add_id, address, type) {
            const api_url = `https://api.getaddress.io/get/${add_id}/?api-key=${api_key}`;

            fetch(api_url)
                .then(response => response.json())
                .then(data => {
                    document.getElementById(`${type}_point`).value = address;

                    const suggestionsList = document.getElementById(`${type}-suggestions-list`);
                    suggestionsList.innerHTML = '';
                    suggestionsList.classList.add('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key={{get_constants('google_map_key')}}&loading=async&libraries=places&callback=initMap"></script> -->
@endsection
