@extends('sitelayout/master')
@section ('css')


<style>
  .BoxLayout a img {

      width: 152px;

  }



  .BoxLayout i {

      font-size: 4rem;

      color: #07d443;

  }



  p.ordex {

      color: green;

  }



  .applyCode .form-group {

      position: relative;

  }



  .applyCode button {

      position: absolute;

      top: 32px;

      right: 0;

      display: flex;

      align-items: center;

      background: #d40707;

      border-color: #d40707;

  }



  /* #checkout-button {

                                  background: #96f;

                                  color: white;

                                  padding: 20px;

                                  border-radius: 49px;

                                  border: none;

                                  margin-top: 5px;

                                  width: 100%;

                                  cursor: pointer;

                                  font-size: 1em;

                                  font-weight: 600;

                                  transition: background 0.2s ease;

                                  display: block;

                                  text-align: center;

                              } */



  .container-custom {

      background-color: #2d4739;

      color: white;

      padding: 20px;

      border-radius: 10px;

      height: 100%;

  }



  .order-section,

  .payment-section {

      background-color: #3a5745;

      border-radius: 8px;

      padding: 15px;

      margin-bottom: 15px;

  }
</style>

@endsection


@section('content')


@php

$userid = session()->get('OrderIDFront');

if (isset($userid)) {
$OrdeData = App\Models\Assessment::where(['id' => $userid])->get();
}

@endphp

<div class="BoxLayout pt-5 pb-5">



    <div class="container mt-5">

        <div class="row">
            {{-- show error message --}}
            <div class="col-md-12">

                @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session()->get('message') }}
                </div>
                @endif
            </div>

            <div class="col-md-6">

                <div class="container-custom">

                    <h4>Pay with 3D secure</h4>

                    <div class="order-section mb-4">

                        <h5>Order Details</h5>

                        <ul class="list-unstyled">

                            <li><strong>Job ID:</strong> <span class="float-right">DD-{{ $OrdeData[0]->id }}</span></li>

                            <li><strong>Job Name:</strong> <span class="float-right">{{ $OrdeData[0]->name }}</span>
                            </li>

                            <li><strong>Date:</strong> <span class="float-right">{{ $OrdeData[0]->created_at }}</span>
                            </li>

                            <li><strong>Sub Total</strong><span class="float-right">${{
                                    number_format($OrdeData[0]->Amount, 2) }}</span></li>

                            @if($discountPrice > 0)
                            @php
                            // Calculate the discount amount
                            $discountAmount = ($OrdeData[0]->Amount * $discountPrice) / 100;
                            // Round down the discount to 2 decimal places (floor with 2 decimals)
                            $discountAmount = floor($discountAmount * 100) / 100;
                            // Calculate the basket total after discount
                            $basketTotal = $OrdeData[0]->Amount - $discountAmount;
                            // Round the basket total to 2 decimal places (no rounding up)
                            $basketTotal = floor($basketTotal * 100) / 100;
                            @endphp

                            <li><strong>Discount</strong><span class="float-right">${{ number_format($discountAmount, 2)
                                    }}</span></li>

                            <li><strong>Basket Total</strong><span class="float-right">${{ number_format($basketTotal,
                                    2) }}</span></li>
                            @else
                            <li><strong>Basket Total</strong><span class="float-right">${{
                                    number_format($OrdeData[0]->Amount, 2) }}</span></li>
                            @endif



                        </ul>



                    </div>

                    <div class="order-section">

                        <h5>Contact Details</h5>

                        <p><strong>Email:</strong> <span class="float-right">{{ $OrdeData[0]->email }}</span></p>

                    </div>




                    <form action="{{ route('front.checkoutDiscount') }}" method="POST">

                        @csrf
                        <div class="row">

                            <div class="col-md-6">

                                <div class="applyCode">

                                    <div class="form-group">

                                        <label>Enter Discount Code</label>

                                        <input class="form-control" name="discountcode" />

                                        <button class="btn btn-primary">Apply</button>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </form>
                </div>

            </div>

            <div class="col-md-6">

                <div class="container-custom">

                    <h5>Total Price:</h5>


                    @if($discountPrice > 0)
                    <?php
                        // Calculate the discount amount
                        $discountAmount = ($OrdeData[0]->Amount * $discountPrice) / 100;
                        // Round down the discount to 2 decimal places (floor with 2 decimals)
                        $discountAmount = floor($discountAmount * 100) / 100;
                        // Calculate the basket total after discount
                        $basketTotal = $OrdeData[0]->Amount - $discountAmount;
                        // Round the basket total to 2 decimal places (no rounding up)
                        $basketTotal = floor($basketTotal * 100) / 100;
                    ?>
                    <h3>USD {{ number_format($basketTotal, 2) }}</h3>
                    @else
                    <h3>USD {{ number_format($OrdeData[0]->Amount, 2) }}</h3>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <button id="checkout-button" class="btn btn-primary w-100 mb-2"> <i class="fa-solid fa-lock"
                                    style="font-size: 14px; color: white; border: 1px solid white; border-radius: 15px; padding: 4px; outline: 1px solid white; margin: 0 5px; outline-offset: 2px;">
                                </i> Pay With <strong>stripe</strong></button>
                        </div>
                        <div class="col-md-6">
                            <a id="checkout-button" href="{{ route('paypal.payment') }}"
                                class="btn btn-primary w-100 mb-2"
                                style="background: #ffd140; background-image: url(https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png); background-repeat: no-repeat; background-position: center; height: 38px; border: none;"></a>
                        </div>
                    </div>

                    <p>By proceeding to checkout you accept our <a href="#">Terms and Conditions</a>.</p>

                    <div class="d-flex justify-content-center mb-3">

                        <img src="{{ asset('storage/FrontLogo/stripecard.png') }}" alt="Stripe Logos" class="img-fluid">

                    </div>

                    <div class="text-center">

                        <p><strong>SSL Secure Payments</strong></p>

                        <p>Your information is protected by 256-bit SSL encryption</p>

                        <p><strong>Excellent</strong> <span
                                class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span></p>

                    </div>

                </div>

            </div>

        </div>

    </div>







    <div class="container">



        <div class="row">



            {{-- <div class="col-md-12">

                <h1 class="text-center mb-3">Payment</h1>

                <table class="table table-bordered table-striped">

                    <thead>

                        <tr>

                            <th>Job ID</th>

                            <th>Job Name</th>

                            <th>Date</th>

                            <th class="text-right">Amount</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>DD-{{ $OrdeData[0]->id }}</td>

                            <td>{{ $OrdeData[0]->name }}</td>

                            <td>{{ $OrdeData[0]->created_at }}</td>

                            <td class="text-right">{{ $OrdeData[0]->Amount }}</td>

                        </tr>

                    </tbody>

                </table>

            </div>



            <div class="col-md-8">



                <ul class="list-unstyled" style="color: #18da18; font-weight:bold">

                    <li>100% Money Back Guarantee</li>

                    <li>Quick Turnaround Time</li>

                    <li>Free Editing</li>

                </ul>



                <h5>Discount Code</h5>



                <div class="row">

                    <div class="col-md-6">

                        <div class="applyCode">

                            <div class="form-group">

                                <label>Enter Discount Code</label>

                                <input class="form-control" name="discountcode" />

                                <button class="btn btn-primary">Apply</button>

                            </div>

                        </div>

                    </div>

                </div>



            </div> --}}

            {{--

            <div class="col-md-4">



                <ul class="list-unstyled">

                    <li><b>Sub Total</b><span class="float-right">{{ $OrdeData[0]->Amount }}</span></li>

                    <li><b>Paypal Charges ({{ $CmsData[0]->paypalCharges }}%)</b><span class="float-right">@php

                            $totalCharges = ($OrdeData[0]->Amount / 100) * $CmsData[0]->paypalCharges;

                            echo $totalCharges;

                            @endphp</span></li>

                    <li><b>Basket Total</b><span class="float-right">{{ $OrdeData[0]->Amount + $totalCharges }}</span>

                    </li>

                </ul>





                <a href="https://www.paypal.com/cgi-bin/webscr?business=order@mastersdigitizing.co.uk&cmd=_xclick&currency_code={{ $OrdeData[0]->CurrencyType }}&amount={{ $OrdeData[0]->Amount + $totalCharges }}&item_name=DD{{ $OrdeData[0]->id }}"
                    class="d-block"><img src="{{ asset('front_assets/images/paypal-button@2x.png') }}" class="img-fluid"
                        style="width:100%;" /></a>

                <button id="checkout-button">Pay using Stripe</button>









                <p class="pt-2 text-center font-weight-bold">The Safer, easier Way to pay</p>



            </div> --}}



        </div>



    </div>



</div>

@endsection

@section ('scripts')

<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe("{{ config('services.stripe.key') }}");

        document.getElementById('checkout-button').addEventListener('click', function() {

            fetch('/checkout-session', {

                    method: 'POST',

                    headers: {

                        'Content-Type': 'application/json',

                        'X-CSRF-TOKEN': '{{ csrf_token() }}'

                    },

                })

                .then(response => response.json())

                .then(session => {

                    return stripe.redirectToCheckout({

                        sessionId: session.id

                    });

                })

                .then(function(result) {

                    if (result.error) {

                        alert(result.error.message);

                    }

                });

        });
</script>
@endsection