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
  </style>
@endsection

@section('content')



  <div class="HeaderContent">

    <div class="container">

      <div class="row">

        <div class="col">



          <div class="ContentInfo pt-4 pb-4">

            <h1 class="text-black font-weight-bolder text-uppercase">Create Your Vector Order</h1>


          </div>



        </div>



      </div>

    </div>

  </div>





  <div class="affordableSec pt-5 pb-5 bg-light">

    <div class="container">

      <div class="row justify-content-center">

        <div class="col-lg-10">




          <!--*******************************Start Page Form*******************-->

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
                      placeholder="Enter Height" required title="field must be in Inches (Written) on It as">

                  </div>

                </div>

                <div class="col-md-4">

                  <div class="form-group">

                    <label class="form-label" style="font-size: 0.9rem;">Width (Inches)</label>

                    <input type="text" name="Width" class="form-control form-control-lg allow_decimal"
                      placeholder="Enter Width" required title="field must be in Inches (Written) on It as">

                  </div>

                </div>

                {{-- This Section is removed from the form as it is not needed --}}
                {{-- <div class="col-12">

                  <div class="alert alert-info mb-3">

                    <div class="d-flex align-items-center">

                      <div>

                        <p class="mb-0">You have selected: <strong id="changeText">Digitize</strong></p>

                        <small class="text-muted">Note: Click <span class="textChange">Digitize</span> for <span
                            class="textChange">Digitize</span> job</small>

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

                  <!--  Do Not show google recptcha input on form
                    <div id="recaptcha-container"></div>
                    -->
                  <!-- Hold recptcha for this site as its need to test
                    <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                    -->
                  <button type="submit" class="btn btn-success btn-lg py-1">

                    Proceed to Order

                  </button>

                </div>

              </div>



            </form>



          </div>



        </div>

        <!--*******************************End of Form*******************-->












      </div>

      <div class="col">



      </div>

    </div>

  </div>

  </div>



@endsection

@section('scripts')
  <script>
    $(document).ready(function() {
      $(document).on('click', '.TypeOrder', function() {
        var datatext = $(this).attr("datatext");
        var dataPrice = $(this).attr("dataPrice");
        $('.TypeOrder').removeClass('btn-success').addClass('btn-danger');
        $(this).removeClass('btn-danger').addClass('btn-success');

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
