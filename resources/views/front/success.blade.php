@extends('sitelayout/master')


@section ('css')


<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">

<style>



  .card {

    background: white;

    padding: 60px;

    border-radius: 4px;

    box-shadow: 0 2px 3px #C8D0D8;

    display: flex;

    margin: 0 auto;

  }



  .btn{

    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;

    text-decoration: none;

    font-size: 14px;

    color: white;

    background: #88B04B;

    padding: 10px 20px;

    margin: 10px 0;

    border-radius: 5px;

    margin-top: 5px;

    box-shadow: 0 2px 3px #C8D0D8;

  }

</style>
@endsection


@section('content')
  <div class="OrderDetails pt-3 pb-3">
    <div class="container">
      <div class="row">

        <div class="card">

          <div
            style="border-radius: 200px; height: 200px; width: 200px; background: #F8FAF5; margin: 0 auto; display: flex; justify-content: space-between; align-content: space-around; flex-direction: column; flex-wrap: wrap;">

            <i style="color: #9ABC66; font-size: 100px; line-height: 200px; margin-left:-15px;">✓</i>

          </div>

          <h1>Success</h1>

          <p>Thank you for your order. order detail are below.</p>

          <p>Order ID: {{ $data->id }}</p>

          <p>Name: {{ $data->name }}</p>

          <p>Order Type: {{ $data->type }}</p>

          <p>Height: {{ $data->height }}</p>

          <p>Width: {{ $data->width }}</p>



          @if (session()->get('CUSTOMER_ID'))
            <p>Redirecting you to your dashboard in 5 seconds...</p>

            <script>
              setTimeout(function() {

                window.location.href = "{{ route('front.dashboard') }}";

              }, 5000);
            </script>
          @else
            <p>Please Login to your customer dashboard to see the current status of your order.</p>

            <form method="post">

              @csrf

              <div class="form-group">

                <label for="">Email Address</label>

                <input type="email" name="emailaddress" class="form-control emailaddress" value="{{ $data->email }}"
                  readonly disabled placeholder="Enter Email Address" required>

              </div>



              <div class="form-group">

                <label for="">Password</label>

                <input type="password" name="Pass" class="form-control Pass" placeholder="Enter Password" required>

              </div>



              <div class="form-group">

                <button type="button" class="btn btn-primary LoginAjax">Sign In</button>

                <a href="javascript:;" class="btn btn-success ForgotPass">Forgot Password</a>

              </div>

            </form>

        </div>
        @endif



      </div>



    </div>



  </div>
@endsection
