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
  <link rel="stylesheet" href="{{ asset('sitelayout-css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('sitelayout-css/custom.css') }}">

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
    <div class="top-section d-md-block d-none">

      <div class="container-fluid">

        <div class="row px-md-4 align-items-center py-1">

          <div class="col">

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


    <!-- Navbar Section -->
    <section class="Navbar_Section border-bottom sticky-top bg-white">
      <div class="container p-0">
        <nav class="navbar navbar-expand-lg p-0">
          <div class="container-fluid p-0 p-2">
            <a class="navbar-brand" href="#">
              <img src="./sitelayout-images/LOGO.png" alt="Logo" width="100px" class="object-fit-contain" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mx-auto gap-md-4 mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#"><i class="ri-home-9-fill"></i> Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fa-solid fa-users-line"></i> About Us</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="ri-service-fill"></i> Services
                  </a>
                  <ul class="dropdown-menu p-1">
                    <li>
                      <a class="dropdown-item" href="#">3D Puff Digitizing</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Applique Digitizing Service</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Cap Digitizing</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Chenille Digitizing</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Custom Embroidery Patches</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Jacket Back Digitizing</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Logo Digitizing</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Sleeve Digitizing</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">T Shirt Embroidery Digitizing</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Vector Artwork Conversion</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fa-solid fa-tags"></i> Samples</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="ri-phone-fill"></i> Contant Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" href="javascript:;" data-toggle="modal" data-target="#SignInModal"><i class="ri-user-3-fill"></i> Sign In</a></li>
                </li>
              </ul>
              <!-- <div class="Navbar-btn">
                <a
                  href="#"
                  class="btn btn-primary animate__animated animate__heartBeat animate__infinite animate__fast"
                  >Get Qoutes</a
                >
              </div> -->
            </div>
          </div>
        </nav>
      </div>
    </section>

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


  <footer class="footer-section pt-5 pb-3">
    <div class="container">
      <div class="row gy-4 align-items-start">
        <!-- About -->
        <div class="col-lg-3 col-md-6">
          <img src="./sitelayout-images/LOGO.png" alt="Embroidery Digitizing Logo" width="120" class="mb-3" />
          <p class="mb-3" style="color: #222">
            Digitizers Online is the reliable source that visions the
            digitizing industry for tomorrow and raises the bars of customer
            experience, and quality.
          </p>
          <div class="mb-3">
            <a href="#" class="me-2 text-dark"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="me-2 text-dark"><i class="fab fa-pinterest-p"></i></a>
            <a href="#" class="me-2 text-dark"><i class="fab fa-instagram"></i></a>
            <a href="#" class="me-2 text-dark"><i class="fab fa-twitter"></i></a>
            <a href="#" class="me-2 text-dark"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="me-2 text-dark"><i class="fab fa-tiktok"></i></a>
          </div>
          <div class="mb-2">
            <i class="fa-solid fa-envelope"></i>
            <span class="ms-2">info@digitizersonline.com</span>
          </div>
          <div>
            <i class="fa-solid fa-phone"></i>
            <span class="ms-2">+1 929 201 3767</span>
          </div>
        </div>
        <!-- Quick Links -->
        <div class="col-lg-3 col-md-6">
          <h5 class="fw-bold mb-3">Quick Links</h5>
          <ul class="list-unstyled footer-links">
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Home</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>About Us</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Samples</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Contact Us</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Free Instant
                Quote</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Reviews</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Sitemap</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Terms and
                Condition</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Privacy
                Policies</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Cancellation
                Policy</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Refund Policy</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Blog</a>
            </li>
          </ul>
        </div>
        <!-- Services -->
        <div class="col-lg-3 col-md-6">
          <h5 class="fw-bold mb-3">Services</h5>
          <ul class="list-unstyled footer-links">
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>3D Puff
                Digitizing</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Applique
                Digitizing</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Cap Digitizing</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Chenille
                Digitizing</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Custom Embroidery
                Patches</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Jacket Back
                Digitizing</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Logo
                Digitizing</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Sleeve
                Digitizing</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>T Shirt
                Embroidery Digitizing</a>
            </li>
            <li>
              <a href="#"><i class="fa-solid fa-angle-right me-2"></i>Vector Artwork
                Conversion</a>
            </li>
          </ul>
        </div>
        <!-- Latest Patches Carousel -->
        <div class="col-lg-3 col-md-6">
          <h5 class="fw-bold mb-3">Our Latest Patches</h5>
          <div class="footer-carousel position-relative">
            <div id="footerPatchCarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner rounded" style="background: #fff">
                <div class="carousel-item active">
                  <img src="./sitelayout-images/sample-01.png" class="d-block w-100 object-fit-cover" alt="Patch 1"
                    style="margin: 0 auto" />
                </div>
                <div class="carousel-item">
                  <img src="./sitelayout-images/sample-02.png" class="d-block w-100" alt="Patch 2"
                    style="margin: 0 auto" />
                </div>
                <div class="carousel-item">
                  <img src="./sitelayout-images/sample-03.png" class="d-block w-100" alt="Patch 3"
                    style="margin: 0 auto" />
                </div>
                <div class="carousel-item">
                  <img src="./sitelayout-images/sample-04.png" class="d-block w-100" alt="Patch 4"
                    style="margin: 0 auto" />
                </div>
                <div class="carousel-item">
                  <img src="./sitelayout-images/sample-05.png" class="d-block w-100" alt="Patch 5"
                    style="margin: 0 auto" />
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#footerPatchCarousel"
                data-bs-slide="prev" style="width: 48px">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#footerPatchCarousel"
                data-bs-slide="next" style="width: 48px">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <hr class="mt-4" style="border-color: #000" />
      <div class="text-center" style="color: #222">
        © 2018 - 2025 Digitizers Online.com All Rights Reserved.
      </div>
    </div>
  </footer>


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
