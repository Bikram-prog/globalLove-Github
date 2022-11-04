@include('header')

<style>
    .box {
        background: #fff;
        padding: 15px;
        /*box-shadow: -1px 0px 7px 1px #ccc;*/
        border-radius: 8px;
        margin-top: 30px;
        margin-bottom: 30px;
        border: 2px solid #444444;
    }

    .hide {
        display: none !important;
    }
</style>
<div class="container mb-5">
    <div class="row">
        <div class="col-md-8 mx-auto" style="border: 2px solid #444444; padding: 10px; padding-top: inherit;">
            @if(count($remove_ads) === 0)

                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
                        <h5 class="font-weight-bold">{{ Session::get('success') }}</h5>
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-error text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
                        <h5 class="font-weight-bold">{{ Session::get('error') }}</h5>
                    </div>
                @endif


                <div class="row">
                    <div class="col-12 text-center" style="background: #3498DB; color: #fff; padding: 14px;">
                        <h2 style="font-size: 32px;">Secure Payment Page</h2>
                        <h5 style="font-size: 22px;">Don't want to see google ads anymore? For the price of AUD $9.90 a month you won't have to.</h5>
                    </div>
                    <div class="col-6" style="padding: 10px; font-size: 20px; border: 2px solid #444444;">
                        <div class="row">
                            <div class="col-2">
                                <span style="font-size: 42px;">🔒</span>
                            </div>
                            <div class="col-10">
                                To protect your details this page uses secure encryption.
                            </div>
                        </div>

                    </div>
                    <div class="col-6" style="background: #2c3e50; color: #fff; padding: 10px; border: 2px solid #444444;">
                        From this point onwards do not close the window, press the back button or refresh the browser as this could result in a failed transaction.
                    </div>
                </div>

                <h2 class="mt-4">Card Details</h2>
                <form
                    role="form"
                    action="{{ route('remove.ads.post') }}"
                    method="post"
                    class="require-validation"
                    data-cc-on-file="false"
                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                    id="payment-form">

                    @csrf

                    <div class="row">
                        <div class="col-8 mx-auto">
                            <div class="form-group required">
                                <label>Name On Card</label>
                                <input type="text" name="" class="form-control" placeholder="eg. John Doe">
                            </div>

                            <div class="form-group required">
                                <label>Card Number</label>
                                <input type="text" name="" class="form-control card-number" >
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group required">
                                        <label>Expire Month</label>
                                        <input type="text" name="" class="form-control card-expiry-month" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group required">
                                        <label>Expire Year</label>
                                        <input type="text" name="" class="form-control card-expiry-year" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group required">
                                        <label>CVC/CVV</label>
                                        <input type="text" name="" class="form-control card-cvc">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <h2 class="mt-4">Customer Details</h2>

                    <div class="row">
                        <div class="col-8 mx-auto">
                            <div class="form-group required">
                                <label>Billing Address</label>
                                <input type="text" name="add_one" class="form-control">
                                <input type="text" name="add_two" class="form-control">
                                <input type="text" name="add_three" class="form-control">
                            </div>

                            <div class="form-group required">
                                <label>Billing City</label>
                                <input type="text" name="city" class="form-control">
                            </div>

                            <div class="form-group required">
                                <label>Billing State</label>
                                <input type="text" name="state" class="form-control">
                            </div>

                            <div class="form-group required">
                                <label>Billing Zip/Post Code</label>
                                <input type="text" name="zip" class="form-control">
                            </div>

                            <div class="form-group required">
                                <label>Billing Country</label>
                                <input type="text" name="country" class="form-control">
                            </div>

                            <hr>

                            <div class='error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.
                                </div>
                            </div>

                            <div class="d-grid gap-2 mb-4">
                                <button type="submit" style="background: #3498DB; border-color: #3498DB;" class="btn btn-success btn-lg btn-block">Submit For Processing</button>
                                <p class="text-center font-weight-bold mt-2 text-black-50">Cards available, and powered by stripe</p>
                            </div>
                        </div>
                    </div>



                </form>
        </div>




    </div>
    @else
        <h2 style="margin-top: 40px;">Your membership will expire on <span class="badge badge-primary">{{ date('l jS \of F Y', strtotime($remove_ads[0]->end_date)) }}</span>. </h2>
    @endif
</div>
</div>

<div style="margin-top: 40px;">&nbsp;</div>

@include('footer')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>

