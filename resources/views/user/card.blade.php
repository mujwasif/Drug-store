@section('title', 'Card Details | Pritom Drug Store')
       
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Enter Payment Details</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <style>
                h1 {
                    text-align: center;
                }

                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }

                .container {
                    background-color: rgb(255, 255, 255);
                    box-shadow: 0 0 80px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                    margin-top: 20px;
                }

                label {
                    display: block;
                    margin-bottom: 8px;
                    font-weight: bold;
                }

                input, textarea {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 16px;
                    box-sizing: border-box;
                    resize: none; 
                }

                button {
                    background-color: #008000;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }

                button:hover {
                    background-color: #013220;
                }
            </style>
        </head>
        <body>

        <div class="container">
            <h1><strong>Enter Payment Details</strong></h1>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-body">

                            @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif

                            <form role="form" action="{{ route('stripe.post',$totalprice) }}"  method="post" class="require-validation"
                                data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                @csrf

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Name on Card</label>
                                        <input class='form-control' size='4' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label'>Card Number</label>
                                        <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label>
                                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label>
                                        <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label>
                                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                    </div>
                                </div>
                           
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" required>

                                <label for="phone">Contact Number:</label>
                                <input type="tel" id="phone" name="phone" required>

                                <label for="e-mail">E-mail:</label>
                                <input type="email" id="mail" name="mail" required>

                                <label for="address">Delivery Address:</label>
                                <textarea id="address" name="address" rows="6" required></textarea>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        </body>

            
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
            
        <script type="text/javascript">
        
        $(function() {
        
            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/
            
            var $form = $(".require-validation");
            
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                'input[type=text]', 'input[type=file]',
                                'textarea'].join(', '),
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
            
            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
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
       




  
