@extends('mastersdigitizing-layout.master')

@section('css')
  <style>
    :root {
      --LightRed: rgb(255 16 16 / 60%);
      --Primary: {{ $CmsData[0]->primaryColor }};
      --Light: rgba(0, 0, 0, 0.6);
      --Secondary: {{ $CmsData[0]->secondaryColor }};
      --White: #fff;
      --Gray: #ece8e8;
      --skyBlue: #ece8e8;
      --Green: #03a84e;
    }

    .HeaderContent {
      border-bottom: none;
      padding: 0px !important;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
        0 2px 4px -1px rgba(0, 0, 0, 0.06),
        inset 0 -1px 0 0 rgba(186, 186, 197, 0.5);
      background: linear-gradient(to bottom, #fff, #f8f9fa);
    }

    /* Form Container Styles */
    .OrderForm {
      background: #ffffff;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    }

    /* Form Header Styles */
    .OrderForm h3 {
      color: var(--Secondary);
      font-weight: 600;
      font-size: 1.8rem;
      margin-bottom: 0.5rem;
    }

    .OrderForm p {
      color: #6c757d;
      font-size: 1rem;
    }

    /* Form Input Styles */
    .form-control {
      border: 2px solid #e9ecef;
      border-radius: 8px;
      padding: 0.75rem 1rem;
      font-size: 0.7rem !important;
      font-weight: 600 !important;
      color: #2c3e50 !important;
    }

    .form-control:focus {
      border: 1px solid #2c3e50;
      box-shadow: 0 0 0 0.2rem rgba(22, 82, 97, 0.15);
    }

    .form-control::placeholder {
      font-weight: 500;
      color: #95a5a6 !important;
    }

    /* Button Styles */
    .btn-green {
      background: var(--Green);
      border: none;
      color: #fff;
      font-weight: 500;
      border-radius: 8px;
    }

    .btn-green:hover {
      background: #028a3f;
      color: #fff;
    }

    .btn-danger {
      background: #dc3545;
      border: none;
      color: #fff;
      font-weight: 500;
      border-radius: 8px;
    }

    .btn-danger:hover {
      background: #c82333;
    }

    /* File Upload Styles */
    .custom-file-upload {
      position: relative;
      display: block;
    }

    .custom-file-upload input[type="file"] {
      position: relative;
      z-index: 2;
      width: 100%;
      height: calc(1.5em + 0.75rem + 2px);
      margin: 0;
      opacity: 0;
    }

    .custom-file-upload .file-upload-label {
      position: absolute;
      top: 0;
      right: 0;
      left: 0;
      z-index: 1;
      height: calc(1.5em + 0.75rem + 2px);
      padding: 0.375rem 0.75rem;
      font-weight: 400;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      border: 2px solid #e9ecef;
      border-radius: 8px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .custom-file-upload .file-upload-label::after {
      content: "Browse";
      background: #6c757d;
      color: #fff;
      padding: 0.375rem 0.75rem;
      border-radius: 6px;
      font-size: 0.875rem;
      margin-left: auto;
      margin-right: -10px;
      cursor: pointer !important;
    }

    .custom-file-upload .file-upload-label span {
      color: #6c757d;
    }

    /* Alert Styles */
    .alert-info {
      background-color: #e8f4f8;
      border: 1px solid var(--Secondary);
      color: var(--Secondary);
      border-radius: 8px;
      padding: 1rem;
    }

    /* Select Styles */
    .form-select {
      border: 2px solid #e9ecef;
      border-radius: 8px;
      padding: 0.75rem 1rem;
      font-size: 1rem;
      font-weight: 500 !important;
      color: #707172 !important;
    }


    .form-select:focus {
      border-color: var(--Secondary);
      box-shadow: 0 0 0 0.2rem rgba(22, 82, 97, 0.15);
    }

    /* Textarea Styles */
    textarea.form-control {
      min-height: 120px;
      resize: vertical;
      font-weight: 600 !important;
      color: #2c3e50 !important;
    }

    /* Error Message Styles */
    .alert-danger {
      background-color: #fff5f5;
      border: 1px solid #feb2b2;
      color: #c53030;
      border-radius: 8px;
      padding: 1rem;
    }

    .alert-danger ul {
      margin-bottom: 0;
      padding-left: 1.2rem;
    }

    /* Helper Text Styles */
    .text-muted {
      font-size: 0.875rem;
      color: #6c757d;
    }
  </style>
@endsection

@section('content')



  <div class="HeaderContent p-0 pb-3 text-md-left text-center">

    <div class="container">

      <div class="row">

        <div class="col">



          <div class="ContentInfo pt-4">

            <h1 class="text-black font-weight-bolder text-uppercase">Create Your Order</h1>


          </div>



        </div>



      </div>

    </div>

  </div>





  <div class="affordableSec pt-4 pb-5 bg-light">

    <div class="container-fluid px-3">

      <div class="row justify-content-center">

        <div class="col-lg-10">

          <div class="OrderForm p-2 p-md-5 rounded shadow-sm bg-white">

            <div class="text-center mb-4">

              <h3 class="mb-2" style="color: #165261; font-weight: 600;">Place an Order</h3>

              <p class="text-muted mb-0">Get the Best Experience of Digitizing</p>

            </div>



            {{-- captcha error --}}
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('front.placeOrder') }}" method="post" enctype="multipart/form-data"
              class="needs-validation" novalidate>

              @csrf

              <div class="row g-3">

                <div class="col-md-6">

                  <div class="form-group">

                    <label class="form-label" style="font-size: 0.9rem;">Design Name</label>

                    <input type="text" name="fullname" class="form-control form-control-lg"
                      placeholder="Enter Your Design Name" required>

                  </div>

                </div>

                <div class="col-md-6">

                  <div class="form-group">

                    <label class="form-label" style="font-size: 0.9rem;">Email Address</label>

                    @if (session()->get('CUSTOMER_ID'))
                      <input type="email" name="Email" class="form-control form-control-lg" readonly
                        value="{{ session()->get('CUSTOMER_EMAIL') }}" required>
                    @else
                      <input type="email" name="Email" class="form-control form-control-lg"
                        placeholder="Enter Your Email" required>
                    @endif

                  </div>

                </div>

                <div class="col-md-4">

                  <div class="form-group">

                    <label class="form-label" style="font-size: 0.9rem;">Phone Number</label>

                    <input type="number" name="Phone" class="form-control form-control-lg"
                      placeholder="Enter Your Phone No" required>

                  </div>

                </div>

                <div class="col-md-4">

                  <div class="form-group">

                    <label class="form-label" style="font-size: 0.9rem;">Height (Inches)</label>

                    <input type="text" name="Height" class="form-control form-control-lg allow_decimal"
                      placeholder="Enter Height" required>

                  </div>

                </div>

                <div class="col-md-4">

                  <div class="form-group">

                    <label class="form-label" style="font-size: 0.9rem;">Width (Inches)</label>

                    <input type="text" name="Width" class="form-control form-control-lg allow_decimal"
                      placeholder="Enter Width" required>

                  </div>

                </div>

                {{-- This Section is removed by the Client wishes --}}
                {{-- <div class="col-12">

                  <div class="alert alert-info mb-3">

                    <div class="d-flex align-items-center">

                      <div>

                        <p class="mb-0">You have selected: <strong id="changeText"> Digitize </strong></p>

                        <small class="text-muted">Note: Click <span class="textChange"> Digitize </span> for <span
                            class="textChange">
                            Digitize </span> job</small>

                      </div>

                    </div>

                  </div>

                </div>

                <div class="col-md-6">

                  <div class="form-group">

                    <button type="button" class="btn btn-success btn-lg w-100 TypeOrder py-1 rounded"
                      dataPrice="{{ $CmsData[0]->digitizePrice }}" datatext="Digitize">

                      <i class="fas fa-pencil-ruler me-2"></i> Digitize

                    </button>

                  </div>

                </div>

                <div class="col-md-6">

                  <div class="form-group">

                    <button type="button" class="btn btn-danger btn-lg w-100 TypeOrder py-1 rounded"
                      dataPrice="{{ $CmsData[0]->vectorizePrice }}" datatext="Vectorized">

                      <i class="fas fa-vector-square me-2"></i> Vectorized

                    </button>

                  </div>

                </div> --}}

                <div class="col-12 ordertype">

                  <div class="form-group">

                    <label class="form-label" style="font-size: 0.9rem;">Order Type: </label>

                    <select name="ordertype" class="form-select w-100 form-select-lg ordertypexs">

                      <option value="" selected>Select Order Type</option>

                      <option value="Left Chest">Left Chest</option>

                      <option value="Sleeve">Sleeve</option>

                      <option value="Cap">Cap</option>

                      <option value="Large Front/Back">Large Front/Back</option>

                      <option value="Full Jacket Back">Full Jacket Back</option>

                    </select>

                  </div>

                </div>

                <div class="col-12">

                  <div class="form-group">

                    <label class="form-label" style="font-size: 0.9rem;">Additional Details</label>

                    <textarea name="additionalDetails" class="form-control" rows="4"
                      placeholder="Please provide any additional details or special requirements" required></textarea>

                  </div>

                </div>

                <div class="col-12">

                  <div class="form-group">

                    <label class="form-label" style="font-size: 0.9rem;">Upload Files</label>

                    <div class="custom-file-upload">
                      <input type="file" name="uploadfiles[]" id="file-upload" multiple required>
                      <label for="file-upload" class="file-upload-label">
                        <span>Choose files...</span>
                      </label>
                    </div>

                    <small class="text-muted d-block mt-2">You can use Ctrl (Cmd) to select multiple files</small>

                  </div>

                </div>

                <div class="col-12">

                  <input type="hidden" name="orderType" class="orderType" value="Digitize">

                  <input type="hidden" name="orderprice" class="orderprice" value="{{ $CmsData[0]->digitizePrice }}">

                  <button type="submit" class="btn btn-success btn-lg py-1">

                    Proceed to Order

                  </button>

                </div>

              </div>

            </form>

          </div>

        </div>

      </div>

    </div>

  </div>



@endsection

@section('scripts')
  <script>
    $(document).ready(function() {





      function generatePassword(passwordLength) {
        var numberChars = "0123456789";
        var upperChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        var lowerChars = "abcdefghijklmnopqrstuvwxyz";
        var specialChars = "!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?";

        // Ensure the password has at least one character from each category
        var password = [
          numberChars[Math.floor(Math.random() * numberChars.length)], // at least one number
          upperChars[Math.floor(Math.random() * upperChars.length)], // at least one uppercase letter
          lowerChars[Math.floor(Math.random() * lowerChars.length)], // at least one lowercase letter
          specialChars[Math.floor(Math.random() * specialChars
            .length)] // at least one special character
        ];

        // Fill the remaining length with random characters from all available sets
        var allChars = numberChars + upperChars + lowerChars + specialChars;

        while (password.length < passwordLength) {
          password.push(allChars[Math.floor(Math.random() * allChars.length)]);
        }

        // Shuffle the password array to randomize character positions
        return shuffleArray(password).join('');
      }

      function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
          const j = Math.floor(Math.random() * (i + 1));
          [array[i], array[j]] = [array[j], array[i]]; // Swap elements
        }
        return array;
      }




      $(document).on('click', '.GeneratePass', function() {



        var GenPass = generatePassword(12);



        $(".newpass").attr('value', GenPass);
        $(".confirmpass").attr('value', GenPass);





      });





      $(document).on('click', '.removeItem', function() {



        var dataid = $(this).attr("dataid");

        $.ajax({

          url: "{{ route('front.frontorderremoveAttachment') }}",

          type: "POST",

          data: 'dataid=' + dataid + '&_token={{ csrf_token() }}',

          success: function(datax) {

            console.log(datax);

          }

        })



        $(this).parent().remove();



      });



      $(document).on('click', '.LoginAjax', function() {

        var emailaddress = $(".emailaddress").val();

        var Pass = $(".Pass").val();



        $.ajax({

          url: "{{ route('front.customerlogin') }}",

          type: "POST",

          data: 'emailaddress=' + emailaddress + '&Pass=' + Pass +
            '&_token={{ csrf_token() }}',

          success: function(datax) {

            console.log(datax);

            if (datax == 'error') {

              Swal.fire(

                'Error!',

                'Login Failed Please Try Correct Email & Password!',

                'warning'

              )

            } else {

              window.location.href = "/dashboard";

            }

          }

        })



      });





      $(document).on('click', '.ForgotnAjax', function() {

        var forgotEmail = $(".forgotEmail").val();





        $.ajax({

          url: "{{ route('front.customerForgot') }}",

          type: "POST",

          data: 'forgotEmail=' + forgotEmail + '&_token={{ csrf_token() }}',

          success: function(datax) {

            console.log(datax);

            if (datax == 'error') {

              Swal.fire(

                'Error!',

                'This customer is not registered with us, You need to sign up',

                'warning'

              );

            } else {

              Swal.fire(

                'Good job!',

                'Forgot Password Email Successfully Send!',

                'success'

              )

              location.reload(0);

            }

          }

        })



      })



      $(".allow_decimal").on("input", function(evt) {

        var self = $(this);

        self.val(self.val().replace(/[^0-9\.]/g, ''));

        if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which >
            57))

        {

          evt.preventDefault();

        }

      });



      $(document).on('click', '.ForgotPass', function() {



        $("#ForgotModal").modal('show');

        $("#SignInModal").modal('hide');



      });



      $('.myTable').DataTable({

        "order": [
          [0, "desc"]
        ],

        "columnDefs": [



          {

            "targets": [0],

            "visible": false

          }

        ]

      });



      $(document).on('click', '.TypeOrder', function() {

        var datatext = $(this).attr("datatext");

        var dataPrice = $(this).attr("dataPrice");

        $('.TypeOrder').removeClass('btn-green').addClass('btn-danger');

        $(this).removeClass('btn-danger').addClass('btn-green');



        $("#changeText").html(datatext);

        $(".textChange").html(datatext);

        $(".orderType").attr("value", datatext);

        $(".orderprice").attr("value", dataPrice);



        if (datatext == 'Vectorized') {

          $(".ordertype").hide();

          $(".ordertypexs").val('');

        } else {

          $(".ordertype").show();

        }

      });



    });
  </script>
@endsection
