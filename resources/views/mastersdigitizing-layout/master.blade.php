<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Embroidery Digitizing Services | Affordable & Reliable</title>


  <link rel="canonical" href="{{ url()->current() }}" />
  <!-- For ahrefs Analytics -->
  <script src="https://analytics.ahrefs.com/analytics.js" data-key="N6lcbktciPjeA8NgOLGk2Q" defer="true"></script>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <meta name="description"
    content="Get high-quality embroidery digitizing services at Digitizing Direct. Affordable pricing, quick turnaround, and premium designs tailored to your needs.">

  {{-- Css Links --}}
  <link rel="stylesheet" href="{{ asset('mastersdigitizing-css/index.css') }}">
  <link rel="stylesheet" href="{{ asset('mastersdigitizing-css/custom.css') }}">

  {{-- bootstrap --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  {{-- Font-Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  @yield ('css')

</head>

<body>

  <div class="HeaderSec">

    {{-- The Top Section --}}
    <div class="topSec">

      <div class="container-fluid">

        <div class="row px-md-4 align-items-center py-1">

          <div class="col">

            {{-- <ul class="d-flex list-unstyled m-0 pt-2 pb-2 gap align-items-center">

              <li class="wall"><a href="mailto:{{ $CmsData[0]->frontEmail }}"><i
                    class="fa-solid fa-envelope mr-1 d-md-inline d-none"></i>
                  {{ $CmsData[0]->frontEmail }}</a></li>

              <li><a class="d-inline-block ml-2" href="tel:{{ $CmsData[0]->frontPhone }}"><i
                    class="fa-solid fa-phone mr-1 d-md-inline d-none"></i>
                  {{ $CmsData[0]->frontPhone }}</a></li>
            </ul> --}}

            <ul class="d-flex list-unstyled m-0 pt-2 pb-2 gap align-items-center">
              @if (!empty($CmsData) && isset($CmsData[0]))
                <li class="wall">
                  <a href="mailto:{{ $CmsData[0]->frontEmail }}">
                    <i class="fa-solid fa-envelope mr-1 d-md-inline d-none"></i>
                    {{ $CmsData[0]->frontEmail }}
                  </a>
                </li>
                <li>
                  <a class="d-inline-block ml-2" href="tel:{{ $CmsData[0]->frontPhone }}">
                    <i class="fa-solid fa-phone mr-1 d-md-inline d-none"></i>
                    {{ $CmsData[0]->frontPhone }}
                  </a>
                </li>
              @else
                <li class="wall">
                  <a href="#"><i class="fa-solid fa-envelope mr-1 d-md-inline d-none"></i> Email Not Available</a>
                </li>
                <li>
                  <a class="d-inline-block ml-2" href="#"><i
                      class="fa-solid fa-phone mr-1 d-md-inline d-none"></i> Phone Not Available</a>
                </li>
              @endif
            </ul>

          </div>

          <div class="col">

            <ul class="d-flex list-unstyled justify-content-end m-0 p-0 gap">

              @if (session()->get('CUSTOMER_ID'))
                <li><a href="/dashboard"><b>Welcome:</b> {{ session()->get('CUSTOMER_EMAIL') }}</a>
                </li>

                <li><a href="/profile">Profile</a></li>

                <li><a href="/change-password">Change Password</a></li>

                <li><a href="/logout">Logout</a></li>
              @else
                <li class="d-md-block d-none"><a class="btn btn-sm btn-success rounded-sm" href="javascript:;"
                    data-toggle="modal" data-target="#SignInModal"><i
                      class="fa-solid fa-arrow-right-to-bracket mr-1"></i> Sign In</a></li>
              @endif

            </ul>

          </div>
        </div>
      </div>
    </div>


    {{-- Navbar --}}
    <div class="HeaderMenu sticky-top">
      <div class="container-fluid p-0 px-md-3">
        <div class="row mx-3 mx-md-4 align-items-center py-3">
          <div class="col-9 col-md-3 p-0">
            <img src="{{ asset('mastersdigitizing-images/Logo.png') }}" alt="" class="" height="90px"
              style="object-fit: cover">
          </div>
          <nav class="navbar navbar-expand-lg navbar-light col-3 col-md-6">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>



            <div class="collapse navbar-collapse" id="navbarSupportedContent">

              <ul class="navbar-nav mx-auto">

                <li class="nav-item {{ request()->is('/') ? 'active ' : '' }}">
                  <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ request()->is('about-us') ? 'active ' : '' }}">
                  <a class="nav-link" href="{{ url('/about-us') }}">About Us</a>
                </li>

                <li
                  class="nav-item dropdown {{ request()->is('logo-digitizing') || request()->is('applique-digitizing') || request()->is('3d-puff-digitizing') || request()->is('embroidered-patches') || request()->is('vector-art-digitizing') || request()->is('jacket-back-digitizing') ? 'active ' : '' }}">

                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" type="button"
                    data-toggle="dropdown" aria-expanded="false">Our Services</a>

                  <div class="dropdown-menu rounded-3 services-dropdown" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item {{ request()->is('logo-digitizing') ? 'active' : '' }}"
                      href="{{ url('/logo-digitizing') }}">Logo Digitizing</a>

                    <a class="dropdown-item {{ request()->is('applique-digitizing') ? 'active' : '' }}"
                      href="{{ url('/applique-digitizing') }}">Applique
                      Digitizing</a>

                    <a class="dropdown-item {{ request()->is('3d-puff-digitizing') ? 'active' : '' }}"
                      href="{{ url('/3d-puff-digitizing') }}">3D Puff Digitizing</a>

                    <a class="dropdown-item {{ request()->is('embroidered-patches') ? 'active' : '' }}"
                      href="{{ url('/embroidered-patches') }}">Embroidered
                      Patches</a>

                    <a class="dropdown-item {{ request()->is('vector-art-digitizing') ? 'active' : '' }}"
                      href="{{ url('/vector-art-digitizing') }}">Vector Art
                      Digitizing</a>

                    <a class="dropdown-item {{ request()->is('jacket-back-digitizing') ? 'active' : '' }}"
                      href="{{ url('/jacket-back-digitizing') }}">Jacket Back
                      Digitizing</a>

                  </div>
                </li>

                <li class="nav-item {{ request()->is('pricing') ? 'active ' : '' }}">
                  <a class="nav-link" href="{{ url('/pricing') }}">Pricing</a>
                </li>

                <li class="nav-item {{ request()->is('contact-us') ? 'active ' : '' }}">
                  <a class="nav-link" href="{{ url('/contact-us') }}">Contact Us</a>
                </li>
              </ul>
            </div>

          </nav>
          <div class="col-md-3 d-none d-md-flex align-items-center justify-content-end p-0">
            <a href="/embroidery-digitizing" class="btn btn-success text-white  rounded-sm"> <i
                class="fa-solid fa-cart-shopping mr-2"></i>Place an Order</a>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Sign In Modal -->

  <div class="modal fade" id="SignInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>

          @if (session()->has('message'))
            <div class="alert alert-danger">



              {{ session()->get('message') }}



            </div>
          @endif

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <div class="modal-body">

          <form method="post">

            @csrf

            <div class="form-group">

              <label for="">Email Address</label>

              <input type="email" name="emailaddress" class="form-control emailaddress"
                placeholder="Enter Email Address" required>

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
      </div>
    </div>
  </div>

  <!-- Forget Password Modal -->

  <div class="modal fade" id="ForgotModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <div class="modal-body">

          <form method="post">
            @csrf

            <div class="form-group">

              <label for="">Email Address</label>
              <input type="email" name="forgotEmail" class="form-control forgotEmail"
                placeholder="Enter Email Address" required>

            </div>

            <div class="form-group">
              <button type="button" class="btn btn-primary ForgotnAjax">Send</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>



  @yield ('content')


  {{-- Footer --}}
  <div class="FooterSec pt-5 pb-5">

    <div class="container-fluid px-4 px-md-5">

      <div class="row">

        <div class="col-md-4 ">
          {{-- Need to change site log --}}

          <img src="{{ asset('mastersdigitizing-images/logo-skeleton.png') }}"
            style="filter: invert(1); width: 250px;" alt="" width="250">

          <p class="text-white pt-3 w-md-75 w-100" style="text-align: justify;">Master Digitizing is committed to
            provide creative, artistic and
            custom embroidery digitizing and vector arts. With the team of passionate designers, we are
            offering high quality online services to USA and international clients at inexpensive rates.
          </p>

        </div>

        <div class="col-md-3 mb-md-0 mb-4">

          <div class="infoLink">

            <h3>Services</h3>

            <a href="{{ url('/logo-digitizing') }}">Logo Digitizing <i
                class="fa fa-arrow-right ml-2 drag-right-arrow"></i></a>

            <a href="{{ url('/applique-digitizing') }}">Applique Digitizing <i
                class="fa fa-arrow-right ml-2 drag-right-arrow"></i></a>

            <a href="{{ url('/3d-puff-digitizing') }}">3D Puff Digitizing <i
                class="fa fa-arrow-right ml-2 drag-right-arrow"></i></a>

            <a href="{{ url('/embroidered-patches') }}">Embroidered Patches <i
                class="fa fa-arrow-right ml-2 drag-right-arrow"></i></a>

            <a href="{{ url('/vector-art-digitizing') }}">Vector Art Digitizing <i
                class="fa fa-arrow-right ml-2 drag-right-arrow"></i></a>

            <a href="{{ url('/jacket-back-digitizing') }}">Jacket Back Digitizing <i
                class="fa fa-arrow-right ml-2 drag-right-arrow"></i></a>

          </div>

        </div>

        <div class="col-md-2 mb-md-0 mb-4">

          <div class="infoLink">

            <h3>Quick Links</h3>

            <a href="{{ url('/') }}">Home <i class="fa fa-arrow-right ml-2 drag-right-arrow"></i></a>

            <a href="{{ url('/about-us') }}">About Us <i class="fa fa-arrow-right ml-2 drag-right-arrow"></i></a>

            <a href="{{ url('/pricing') }}">Pricing <i class="fa fa-arrow-right ml-2 drag-right-arrow"></i></a>

            <a href="{{ url('/contact-us') }}">Contact <i class="fa fa-arrow-right ml-2 drag-right-arrow"></i></a>

          </div>

        </div>

        <div class="col-md-3">

          {{-- <div class="infoLink">
            <h3>Contact Details</h3>
            <a href="tel:{{ $CmsData[0]->frontPhone }}">{{ $CmsData[0]->frontPhone }}</a>
            <a href="javascript:;">{{ $CmsData[0]->aboutTitle }}</a>
            <a href="mailto:{{ $CmsData[0]->frontEmail }}">{{ $CmsData[0]->frontEmail }}</a> --}}

          <div class="infoLink">
            <h3>Contact Details</h3>
            @if (!empty($CmsData) && isset($CmsData[0]))
              <a href="tel:{{ $CmsData[0]->frontPhone }}">{{ $CmsData[0]->frontPhone }}</a>
              <a href="javascript:;">{{ $CmsData[0]->aboutTitle }}</a>
              <a href="mailto:{{ $CmsData[0]->frontEmail }}">{{ $CmsData[0]->frontEmail }}</a>
            @else
              <a href="#">Phone Not Available</a>
              <a href="#">Title Not Available</a>
              <a href="#">Email Not Available</a>
            @endif



            <h4 class="pt-4">Follow us</h4>

            <ul class="d-flex list-unstyled">

              <li><a href="javascript:;"><i class="fa-brands fa-facebook-f"></i></a></li>

              <li><a href="javascript:;"><i class="fa-brands fa-instagram"></i></a></li>

              <li><a href="javascript:;"><i class="fa-brands fa-twitter"></i></a></li>

              <li><a href="javascript:;"><i class="fa-brands fa-whatsapp"></i></a></li>

            </ul>

          </div>

        </div>

      </div>

    </div>

  </div>

  {{-- The Last CopyRight Section --}}
  <div class="copyRightSec pt-2 pb-2">

    <div class="container">

      <div class="row">

        <div class="col-12 text-center">

          <p class="m-0">©2025 Master Digitizing Services. All Rights Reserved.</p>

        </div>

        <div class="col"></div>

      </div>

    </div>

  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <script src="{{ asset('front_assets/js/input.js') }}"></script>

  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if (Session::has('messageForgot'))
    <script>
      Swal.fire(

        'Good job!',

        'Your Fogot Email has Been Successfully Send to Your Email Address!',

        'success'

      )
    </script>
  @endif

  <script>
    var Tawk_API = Tawk_API || {},

      Tawk_LoadStart = new Date();

    (function() {

      var s1 = document.createElement("script"),

        s0 = document.getElementsByTagName("script")[0];

      s1.async = true;

      s1.src = 'https://embed.tawk.to/60e4327bd6e7610a49a9da35/1f9tmadbs';

      s1.charset = 'UTF-8';

      s1.setAttribute('crossorigin', '*');

      s0.parentNode.insertBefore(s1, s0);

    })();
  </script>
  <!-- Initialize Swiper -->

  <script>
    var swiper = new Swiper(".mySwiper", {

      slidesPerView: 1,

      spaceBetween: 10,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },

      smartBullets: true,
      speed: 1000,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      pagination: {

        el: ".swiper-pagination",

        clickable: true,

      },

      breakpoints: {

        640: {

          slidesPerView: 1,

          spaceBetween: 20,

        },

        768: {

          slidesPerView: 3,

          spaceBetween: 40,

        },

        1024: {

          slidesPerView: 3,

          spaceBetween: 50,

        },
      },
    });
  </script>


  {{-- recpatcha --}}
  <script src="https://www.google.com/recaptcha/api.js?onload=showRecaptcha&render=explicit" async defer></script>

  {{-- set recaptacha --}}
  <script>
    // show recaptcha
    function showRecaptcha() {
      var element = document.getElementById('recaptcha-container');
      if (element) {
        grecaptcha.render(element, {
          'sitekey': '{{ config('services.recaptcha.key') }}'
        });
      }
    }
  </script>

  {{-- recaptcha validation --}}
  <script>
    function recaptchaValidation() {
      var recaptcha = grecaptcha.getResponse();
      if (recaptcha === '') {
        event.preventDefault();
        alert('Please fill the recaptcha');
        return false;
      } else {
        $('#recaptcha_token').val(recaptcha);
      }
    }
  </script>

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
            57)) {
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

        "columnDefs": [{
          "targets": [0],

          "visible": false
        }]
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


  @yield ('scripts')
</body>

</html>
