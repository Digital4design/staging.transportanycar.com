@extends('layouts.web.app')

@section('head_css')
<style>
  @media only screen and (max-width: 390px) and (max-height: 844px) {
    .stripe-label {
      margin-top: -4px;
    }
  }
  .back-wrapper {
    margin-bottom: 20px;
  }
  .cehckout_formblog.main_cart_sec {
    padding: 0;
    box-shadow: none;
  }
  .cart_radio_btn {
    display: flex;
    justify-content: space-between;
    max-width: 629px;
    margin-left: auto;
    margin-bottom: 30px;
  }
  .main_cart_sec {
      background: #f4f4f4;
      border-radius: 0;
      padding: 30px !important;
  }
  .cart_radio_btn .custom_radiobtn {
      width: 48%;
  }
  .form-group.cart_radio {
      position: relative;
      width: 100%;
  }
  .form-group.cart_radio input {
      position: absolute;
      width: 100%;
      left: 0 !important;
      height: 100%;
      top: 0;
      opacity: 0;
  }
  .form-group.cart_radio label:after,
  .form-group.cart_radio label:before{
      display: none !important;
  }
  .form-group.cart_radio label {
      border: 1px solid #ccc;
      padding: 10px 20px !important;
      width: 100%;
      border-radius: 8px;
      box-shadow: 0 0 2px 0px #ccc;
      display: block;
      text-align: left;
  }
  .custom_radiobtn svg.p-Icon {
      width: 22px;
      display: block;
  }
  .form-group.cart_radio input:checked + label{
      border-color: #0073e5;
      color: #0073e5;
      box-shadow: 0 0 2px 0px #0073e5;
  }
  .form-group.cart_radio input:checked + label svg path{
      fill: #0073e5;
  }
  .cart_radio_btn .form-group.cart_radio label{
    font-size: 18px;
      font-weight: 500;
      color: #9c9595;
  }
  .cart_radio_btn  .custom_radiobtn svg.p-Icon{
    height: 35px;
  }
  .cehckout_formblog .back-icon{
    text-align: left;
      display: block;
      margin-bottom: 20px;
  }
  .cehckout_formblog .back-icon svg{
    margin-right: 4px;
  }

  .checkout-loader {
    overflow: hidden !important;
    height: 100vh;
  }

  #payment-message {
    color: rgb(105, 115, 134);
    font-size: 16px;
    line-height: 20px;
    padding-top: 12px;
    text-align: center;
  }

  .ruleslist_blog {
      background: #fff;
  }
  .checkout_title {
      font-size: 20px;    border-bottom: 1px solid #ffffff;   
  }
  .ruleslist_blog li span {
      box-shadow: 0px 4px 4px 0px #00000040;
  }
  .payment_cart a.back-icon {
      color: #777;
      display: flex;
      align-items: center; margin-bottom: 20px;
  }
  .payment_cart a.back-icon svg {
      margin-right: 7px;
  }
  .payment_cart a.back-icon svg path {
      stroke: #777;
  }
  .cehckout_formblog .wd_get_btn {
      max-width: 100%;
  }
  .cart_radio_btn .custom_svg .form-group svg {
      width: 48px;
      height: 26px;
      display: block;
      border-radius: 2px;
      border: 1px solid;
      padding: 0px;
  }
  .form-group.cart_radio label br {
      display: none;
  }

  .loader {
      /* Styles for loader */
      border: 4px solid rgba(0, 0, 0, 0.1);
      border-left-color: #4a90e2;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      animation: spin 1s linear infinite;
  }

  @keyframes spin {
      to { transform: rotate(360deg); }
  }
  .payment-loader {
      position: fixed;
      background: #ffffff69;
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 2;
      overflow: hidden;
  }
  .payment-loader.hidden{
    display: none;
  }

  div#spinner.loader {
      margin: auto;
      border: 4px solid rgb(245 245 245);
      border-left-color: #4a90e2;
  }


  @media(min-width: 768px){
    .new_form_sec {
      order: 2;
  }

  .new_text_sec {
      order: 1;
  }
}
@media (max-width: 767px){
  .back-wrapper {
    margin-bottom: 15px;
  }
  .cart_radio_btn .custom_svg .form-group svg {
    width: 48px;
    height: 28px;
    display: block;
    border-radius: 2px;
    border: 1px solid;
    padding: 0px;
}
.ruleslist_blog {
    background: #F1F1F1;
    margin: 0px 0 30px;
    height: auto;
    padding: 28px;
}
.main_cart_sec {
    background: #ffffff;
    border-radius: 0;
    padding: 0px !important;
}
.cart_radio_btn {
    margin-bottom: 0; 
}
.cehckout_formblog .custom_radiobtn {
    border: none;
    margin-bottom: 5px;
}
.cart_radio_btn  .custom_radiobtn svg.p-Icon {
    height: 28px;
}
.cehckout_formblog.main_cart_sec {
    margin-bottom: 100px;
}
.wd_title h3 {
    font-size: 32px;
    margin-bottom: 18px;
    color: #000;
}
.wd_title p {
    font-size: 16px;
    margin-bottom: 17px;
}
.review_quote_blog .wd_title {
    margin-bottom: 1rem;
}
section.review_quote_blog.payment_cart {
    padding-top: 0;
}
.payment_cart a.back-icon {
    margin-bottom: 15px;
}
.ruleslist_blog li:nth-last-child(1) {
    margin-bottom: 0;
}

.wd_title p br{
  display: block;
}
.ruleslist_blog li p {
    line-height: 1.5;
}

}


</style>
@endsection

@section('content')
    @include('layouts.web.only-logo')
    <main>
        <section class="review_quote_blog payment_cart">
          <div class="payment-loader hidden" ><div id="loader" class="loader"></div></div>
          <div class="container">
            <div class="wd_title text-center">
                <h3>Secure booking</h3>
                <p>Enter your payment details below to pay the<br> deposit and secure your booking.</p>
            </div>
            <div class="d-flex flex-wrap align-items-center justify-content-between">
              <a href="{{route('front.quotes', $data->user_quote_id)}}" class="form-wizard-previous-btn back-icon">
                <svg width="7" height="13" viewBox="0 0 7 13" fill="none" class="color-change" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 11.5L1 6.5L6 1.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                Back to quotes 
              </a>
              <span style="font-size:12px; line-height: 15px;" class="d-flex align-items-center back-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M18 8.521C18.125 15.366 14.042 18.278 11.727 18.965C11.5737 19.0106 11.4103 19.0106 11.257 18.965C8.98 18.29 5.014 15.464 5 8.862C5.01372 8.29149 5.33458 7.7729 5.839 7.506C9.363 5.516 11.058 5 11.489 5C11.92 5 13.749 5.549 17.507 7.7C17.8045 7.86767 17.9918 8.17958 18 8.521Z" fill="#52D017" stroke="#52D017" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.5 12.015L10.5 14.015L14.5 10.007" fill="#52D017"/>
                <path d="M8.5 12.015L10.5 14.015L14.5 10.007" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span>Secure payments by</span> <span class="stripe-label" style="font-weight:500; font-size:20px; line-height: 22px; margin-left:3px;">stripe</span>
            </span>
          </div>
            <div class="cehckout_formblog main_cart_sec" >
                <div class="row">
                  @if(isMobile())
                  <div class="new_text_sec col-lg-5 col-md-6">
                      <ul class="ruleslist_blog">
                        <h6 class="checkout_title">What happens next?</h6>
                        <li>
                            <span>1</span>
                            <p>Pay deposit of <b>&nbsp;£{{number_to_dec($data->deposit, 2,'.', '')}}.</b></p>
                        </li>
                        <li>
                            <span>2</span>
                            <p><b>{{$transporter_name}}</b> will contact you to make final arrangements.</p>
                        </li>
                        <li>
                            <span>3</span>
                            <p>Pay the remaining balance of <b>£{{number_to_dec($data->transporter_payment, 2,'.', '')}}</b> directly to the transporter on completion of the job.</p>
                        </li>
                      </ul>
                  </div>
                  @endif
                  <div class="new_form_sec col-lg-7 col-md-6">
                      <div class="cart_radio_btn" style="display:none">
                        <div class="custom_radiobtn">
                            <div class="form-group cart_radio">
                              <input type="radio" id="ck1" name="payment-method" value="card" checked="">
                              <label for="ck1">
                                  <svg class="p-Icon p-Icon--card Icon p-Icon--md p-TabIcon TabIcon p-TabIcon--selected TabIcon--selected" role="presentation" fill="var(--colorIcon)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4a2 2 0 012-2h12a2 2 0 012 2H0zm0 2v6a2 2 0 002 2h12a2 2 0 002-2V6H0zm3 5a1 1 0 011-1h1a1 1 0 110 2H4a1 1 0 01-1-1z"></path>
                                  </svg>
                                  <br> Card
                              </label>
                            </div>
                        </div>
                        <div class="custom_radiobtn custom_svg">
                            <div class="form-group cart_radio">
                              <input type="radio" id="ck2" name="payment-method" value="applePay">
                              <label for="ck2">
                                  <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="24px" height="24px">
                                    <path d="M 4.9902344 7 C 4.4962344 7.02 3.8870625 7.2871562 3.5390625 7.6601562 C 3.2190625 7.9831562 2.9475781 8.5050938 3.0175781 8.9960938 C 3.5755781 9.0370938 4.1324687 8.7497187 4.4804688 8.3867188 C 4.8224687 8.0127187 5.0482344 7.512 4.9902344 7 z M 8 7 L 8 15 L 9 15 L 9 12 L 10.5 12 C 11.678487 12 12.53425 11.103696 12.792969 10 L 13 10 L 13 9.5 C 13 8.1272727 11.872727 7 10.5 7 L 8 7 z M 9 8 L 10.5 8 C 11.327273 8 12 8.6727273 12 9.5 C 12 10.327273 11.327273 11 10.5 11 L 9 11 L 9 8 z M 4.7402344 9 C 4.0802344 9 3.6087813 9.359375 3.3007812 9.359375 C 2.9877812 9.359375 2.5204688 9.0039062 1.9804688 9.0039062 C 1.3204688 9.0039062 0.67303125 9.4174844 0.33203125 10.021484 C -0.36796875 11.228484 0.151125 13.016 0.828125 14 C 1.160125 14.486 1.5596094 15 2.0996094 15 C 2.5946094 14.982 2.761375 14.699219 3.359375 14.699219 C 3.961375 14.699219 4.1396875 15 4.6796875 15 C 5.2196875 15 5.5479063 14.504578 5.8789062 14.017578 C 6.2569063 13.465578 6.4099219 12.928391 6.4199219 12.900391 C 6.4109219 12.891391 5.3742344 12.492922 5.3652344 11.294922 C 5.3562344 10.292922 6.18175 9.8160625 6.21875 9.7890625 C 5.75275 9.0960625 4.9807812 9 4.8007812 9 L 4.7402344 9 z M 15.625 9 C 14.654762 9 14.044326 9.2956024 13.716797 9.6699219 C 13.389267 10.044241 13.375 10.5 13.375 10.5 L 14.375 10.5 C 14.375 10.5 14.360733 10.45576 14.470703 10.330078 C 14.580677 10.204398 14.845238 10 15.625 10 C 16.569853 10 16.803743 10.273796 16.919922 10.488281 C 17.036101 10.702766 17.005859 10.917969 17.005859 10.917969 L 17 10.958984 L 17 11 L 15.375 11 C 13.923 11.101 13.001953 11.825766 13.001953 13.009766 C 13.001953 14.205766 13.813609 15 14.974609 15 C 15.920712 15 16.564085 14.508723 17 13.894531 L 17 15 L 18 15 L 18 11 L 17.994141 11.082031 C 17.994141 11.082031 18.088901 10.547234 17.798828 10.011719 C 17.508798 9.4762044 16.805147 9 15.625 9 z M 19.005859 9 L 20.970703 14.691406 L 20.634766 15.664062 C 20.565766 15.864063 20.374109 16 20.162109 16 L 19 16 L 19 17 L 20.162109 17 C 20.801109 17 21.372078 16.593281 21.580078 15.988281 L 23.994141 9 L 22.9375 9 L 21.5 13.158203 L 20.0625 9 L 19.005859 9 z M 15.412109 12 L 16.759766 12 C 16.560766 12.771 16.072609 14 14.974609 14 C 14.355609 14 14.001953 13.638766 14.001953 13.009766 C 14.001953 12.267766 14.760109 12.05 15.412109 12 z"/>
                                  </svg>
                                  <br>
                                  Apple pay
                              </label>
                            </div>
                        </div>
                      </div>
                      <form action="javascript:void(0)" class="form_askque" id="payment-form">
                        <div id="payment-element">
                            <!--Stripe.js injects the Payment Element-->
                        </div>
                        <div id="apple-pay-element">
                            <!--Stripe.js injects the Payment Element-->
                        </div>
                        <div class="form-group">
                            <!-- <a href="javascript:;" class="wd_get_btn" data-toggle="modal" data-target="#completemodal">Submit payment (£50<a href="javascript:;" class="wd_get_btn".00)</a> -->
                            <button type="submit" id="submit" class="wd_get_btn" >
                              <div class="loader hidden" id="spinner"></div>
                              <span id="button-text">Submit payment (£{{$data->deposit}})</span>
                            </button>
                        </div>
                        <img src="/assets/images/payment-type.png" alt="" class="img-fluid mb-4 mb-md-0" />
                        <div id="payment-message" class="hidden"></div>
                      </form>
                  </div>
                  @if(!isMobile())
                  <div class="new_text_sec col-lg-5 col-md-6">
                      <ul class="ruleslist_blog">
                        <h6 class="checkout_title">What happens next?</h6>
                        <li>
                            <span>1</span>
                            <p>Pay deposit of <b>£{{number_to_dec($data->deposit, 2,'.', '')}}</b></p>
                        </li>
                        <li>
                            <span>2</span>
                            <p>{{$transporter_name}} will contact you to make final arrangments.</p>
                        </li>
                        <li>
                            <span>3</span>
                            <p>Pay the remaining balance of <b>£{{number_to_dec($data->transporter_payment, 2,'.', '')}}</b> directly to  {{$transporter_name}}.</p>
                        </li>
                      </ul>
                  </div>
                  @endif
                </div>
            </div>
          </div>
        </section>
    </main>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="{{asset('assets/web/js/main.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
      $(document).ready(function() {
          // Show loader initially
          $('.payment-loader').removeClass('hidden');
          $('body').addClass('checkout-loader')
          const stripe = Stripe('{{ config('services.stripe.key') }}');
          const csrfToken = "{{ csrf_token() }}";
          let elements;
          let clientSecret;
          initialize();
          checkStatus();
          // Event listener for form submission
          $("#payment-form").on("submit", function(e) {
            e.preventDefault();
            handleSubmit();
          });
        // Fetches a payment intent and captures the client secret
          async function initialize() {
            try {
                const items = {
                  amount : "{{$data->deposit}}",
                  user_quote_id : "{{$data->user_quote_id}}",
                  quote_by_transporter_id : "{{$data->id}}"
                };
                const response = await $.ajax({
                url: "{{ route('front.process_payment') }}",
                method: "POST",
                headers: {
                  'X-CSRF-TOKEN': csrfToken, // Include CSRF token in headers
                  'Content-Type': 'application/json',
                },
                dataType: "json",
                data: JSON.stringify({ items }), // Uncomment if you need to send data
              });

              setTimeout(function() {
                  $('.payment-loader').addClass('hidden');
                  $('body').removeClass('checkout-loader')
              }, 2000); // 7000 milliseconds = 7 seconds

              const { clientSecret } = response;
              elements = stripe.elements({ clientSecret });

              const paymentElementOptions = {
                layout: "tabs",
                defaultValues: {
                  billingDetails: {
                    address: {
                      country: "GB"
                    }
                  }
                },
              };

              const paymentElement = elements.create("payment", paymentElementOptions);
              paymentElement.mount("#payment-element");


                // // Check for Apple Pay availability
                // if (window.ApplePaySession && ApplePaySession.canMakePayments()) {
                //   const applePayElement = elements.create("applePay");
                //   applePayElement.mount("#apple-pay-element");
                // }
              } catch (error) {
                console.error("Error initializing payment:", error);
                // Handle error as needed
              }
          }

          // Function to handle form submission
          async function handleSubmit() {
            setLoading(true);
            const { error } = await stripe.confirmPayment({
              elements,
              confirmParams: {
                return_url: "{{ route('front.payment_confirm') }}",
              },
            });

            if (error) {
              if (error.type === "card_error" || error.type === "validation_error") {
                showMessage(error.message);
              } else {
                showMessage("An unexpected error occurred.");
              }
            }
            setLoading(false);
          }
          // Fetches the payment intent status after payment submission
          async function checkStatus() {
            const clientSecret = new URLSearchParams(window.location.search).get(
              "payment_intent_client_secret"
            );
            if (!clientSecret) {
              return;
            }

            const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);
              switch (paymentIntent.status) {
                case "succeeded":
                  showMessage("Payment succeeded!");
                  redirectToConfirmation();
                  break;
                case "processing":
                  showMessage("Your payment is processing.");
                  redirectToConfirmation();
                  break;
                case "requires_payment_method":
                  showMessage("Your payment was not successful, please try again.");
                  redirectToConfirmation();
                  break;
                default:
                  showMessage("Something went wrong.");
                  redirectToConfirmation();
                  break;
              }
          }

          // UI helper function to display messages
          function showMessage(messageText) {
            const messageContainer = $("#payment-message");

            messageContainer.removeClass("hidden");
            messageContainer.text(messageText);

            setTimeout(function () {
              messageContainer.addClass("hidden").text("");
            }, 4000);
          }

          // UI helper function to toggle loading state
          function setLoading(isLoading) {
            if (isLoading) {
              $("#submit").prop("disabled", true);
              $("#spinner").removeClass("hidden");
              $("#button-text").addClass("hidden");
            } else {
              $("#submit").prop("disabled", false);
              $("#spinner").addClass("hidden");
              $("#button-text").removeClass("hidden");
            }
          }

          // Function to redirect to confirmation page
          function redirectToConfirmation() {
            setTimeout(function() {
              window.location.href = "{{ route('front.payment_confirm') }}";
            }, 7000); // Adjust the timeout duration as needed
          }

         // Event listener for payment method selection
        $("input[name='payment-method']").change(function() {
            const selectedMethod = $(this).val();
            if (selectedMethod === "applePay") {
                // Show Apple Pay elements, hide others if needed
                $("#payment-element").hide(); // Assuming ID of non-Apple Pay element
                $("#apple-pay-element").show();
                initialize(); // Call initialize() when Apple Pay is selected
            } else {
                // Show card elements or other payment method elements
                $("#apple-pay-element").hide();
                $("#payment-element").show();
            }
        });
        //Event listener for Apple Pay button click
        $("#apple-pay-element").on("click", async function(e) {
            e.preventDefault(); // Prevent default form submission or other actions
            const paymentRequest = stripe.paymentRequest({
                country: 'US',
                currency: 'usd',
                total: {
                    label: 'Transport any car',
                    amount: parseInt({{$data->deposit}}) * 100 // Amount in cents
                },
            });

            const appleElement = stripe.elements();
            const prbutton = appleElement.create('paymentRequestButton',{
              paymentRequest : paymentRequest,
            });

            paymentRequest.canMakePayment().then(function(result) {
                if (result) {
                  prbutton.mount('#apple-pay-element');
                } else {
                    $('#apple-pay-button').hide();
                }
            });
            paymentRequest.on('paymentmethod', async (ev) => {
              try {
                  const items = {
                    amount: "{{$data->deposit}}",
                    user_quote_id: "{{$data->user_quote_id}}",
                    quote_by_transporter_id : "{{$data->id}}",
                    paymentMethodType: 'card',
                    currency: 'usd'
                  };
                  const response = await $.ajax({
                      url: "{{ route('front.process_payment') }}",
                      method: "POST",
                      headers: {
                          'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token in headers
                          'Content-Type': 'application/json',
                      },
                      dataType: "json",
                      data: JSON.stringify({ items })
                  });
                  const { clientSecret } = response;

                  const {paymentIntent, error: confirmError} = await stripe.confirmCardPayment(
                      clientSecret,
                      {payment_method: ev.paymentMethod.id},
                      {handleActions: false}
                  );

                  if (confirmError) {
                      ev.complete('fail');
                      console.log('payment failed');
                  } else {
                      ev.complete('success');
                      if (paymentIntent.status === "requires_action") {
                          // Let Stripe.js handle the rest of the payment flow.
                          const { error } = await stripe.confirmCardPayment(clientSecret, {
                              return_url: "{{ route('front.payment_confirm') }}",
                          });
                          if (error) {
                              console.error(error.message);
                          }
                      }
                  }
              } catch (error) {
                  console.error('Error during payment method handling:', error);
                  ev.complete('fail');
              }
            });
        });

      });
    </script>
@endsection
