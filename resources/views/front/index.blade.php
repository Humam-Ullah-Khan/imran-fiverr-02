<script async src="https://www.google.com/recaptcha/api.js"></script>

@extends('mastersdigitizing-layout/master')

<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is https://digitizersonline.com/
<br><br><br>


@section('content')


  <div class="hero-section">
    <div class="container-fluid  mb-5">

      <div class="row  mx-0 mx-md-4 ">

        <div class="col-md-8 p-0 hero-content rounded-sm">
          <div class="row">
            <div class="col-md-5 pt-md-5 pt-3 d-flex justify-content-center pl-md-5 pl-4 pb-5 pr-4 pr-md-0">
              <div class="rounded-sm  pt-3 pb-3 d-flex  align-items-center flex-column position-relative"
                style="box-shadow: 1px 1px 11px rgba(255, 255, 255,0.6);border:1px solid rgba(255, 255, 255,0.5);height:fit-content;">
                <div class="pl-5 w-100">
                  <p class="text-white m-0 text-center" style="font-size: 13px;">We handle the hard
                    part —
                    you
                    just get results.</p>
                </div>
                <img src="{{ asset('mastersdigitizing-images/shirt.png') }}" alt="clock" class="hero-showcase-img" width="100%" height="100%">
                <div class="ribbon">
                  Certified
                </div>
                <h6 class="text-white text-center px-3">EMBROIDERY DIGITIZING DIRECT TO JUMPSTART YOUR
                  DIGITIZING
                  </h2>

                  <p class="text-white px-4" style="font-size: 13px;text-align: justify;"> Starting up
                    an
                    embroidery project is all fun and creativity until you
                    have to
                    transform your designs into a stitch file that you can actually use. That is
                    where
                    <b>Embroidery
                      Digitizing</b> Services comes into play. We offer an easy-to-follow
                    approach,
                    converting
                    your art into a machine-readable embroidery format promptly with excellent
                    quality
                    in
                    every
                    stitch.
                  </p>
              </div>
            </div>
            <div class="col-md-7 pt-md-5 pt-2 pl-5 pl-md-3 pr-3 pb-5">
              <div class="ContentInfo">
                <p class="text-white">We Are The Best <br>
                  <span class="main-text my-3">Embroidery Digitizing Services</span><br>
                  According
                  To
                  Your Needs</h1>

                <p class="text-white">Our expert embroidery digitizers focus on premium quality so your
                  designs look
                  as beautiful as you imagined. From hobbyists wanting to elevate their home project
                  to
                  business
                  owners needing bulk embroidery conversion, we provide tailored solutions to match
                  your
                  exact
                  requirements.</p>


                <div class="d-flex align-items-center gap pr-3">
                  <a class="special-btn rounded-sm d-inline-block mb-md-4 mb-3"
                    href="{{ url('/embroidery-digitizing') }}">
                    Digitize My
                    Design <i class="fa-solid fa-caret-right"></i></a>
                  <a class="special-btn rounded-sm d-inline-block mb-md-4 mb-3" href="{{ url('/vector-art') }}"> Vector
                    My
                    Artwork <i class="fa-solid fa-caret-right"></i></a>
                </div>

                <div class="d-flex justify-content-center bg-white rounded-sm p-4" style="height:300px; width:98%;">
                  <img src="{{ asset('mastersdigitizing-images/before-after-2.png') }}" alt="" width="100%"
                    height="100%" style="object-fit: contain">
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-md-4 p-0 pl-md-4 mt-md-0 mt-3">
          <div class="artwork-container rounded-sm h-100 d-flex justify-content-center">
            <img src="{{ asset('mastersdigitizing-images/artwork-steps-butterfly.png') }}" alt=""
              class="img-fluid rounded-sm" width="100%" height="100%">
          </div>

        </div>

      </div>

    </div>
  </div>


  {{-- Why Choose Us  --}}
  <div class="AboutSec mb-5">

    <div class="container-fluid">

      <h2 class="text-center mb-4" style="font-family: fantasy">Why Choose Embroidery Digitizing Direct?</h2>

      <p class="text-center w-75 mx-auto">We offer crystal-clear stitch work with custom digitizing solutions, support
        for all major formats like PES
        and DST, quick turnaround times, and the best rates—ensuring precision, compatibility, and value for every
        embroidery project.</p>

      <div class="row mt-5 px-5">
        <x-choose-us-card title="Crystal-Clear Stitch"
          description="High-quality image digitizing ensures a high level of pixel density for precise image transfer."
          image="{{ asset('mastersdigitizing-images/thread-icon.png') }}" />
        <x-choose-us-card title="Custom Solutions"
          description="Whether your design is  minimalistic  or intricate, we have customized solutions that cater to your project needs."
          image="{{ asset('mastersdigitizing-images/puzzle-icon.png') }}" />
        <x-choose-us-card title=" Formats Supported"
          description="PES, DST, XXX, and more. We make sure your files are compatible with your embroidery machine."
          image="{{ asset('mastersdigitizing-images/file-icon.png') }}" />
        <x-choose-us-card title="  Quick Turnaround Times"
          description="High-quality image digitizing ensures a high level of pixel density for precise image transfer."
          image="{{ asset('mastersdigitizing-images/bolt-icon.png') }}" />
      </div>
    </div>

  </div>


  <div class="OurWork mb-5">
    <div class="container-fluid">
      <h2 class="text-center mb-4" style="font-family: fantasy">Explore a Selection of Our Finest Embroidery
        Digitizing Projects</h2>

      <p class="text-center w-75 mx-auto">From sharp, intricate stitch work to clean, minimal designs—our digitizing
        services deliver precision, quality, and versatility across a wide range of styles and formats.
      </p>

      <div class="row justify-content-center mt-5">
        <div class="col-lg-10">
          <ul class="nav nav-pills justify-content-center mb-5 our-work-nav" id="myTab" role="tablist"
            style="gap: 10px;">
            <li class="nav-item">
              <a class="nav-link active px-4 py-2 rounded-pill" id="All-tab" data-toggle="tab" href="#All"
                role="tab" aria-controls="All" aria-selected="true">All</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-4 py-2 rounded-pill" id="CustomEmbrio-tab" data-toggle="tab" href="#CustomEmbrio"
                role="tab" aria-controls="CustomEmbrio" aria-selected="false">Custom Embroidery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-4 py-2 rounded-pill" id="VectorArt-tab" data-toggle="tab" href="#VectorArt"
                role="tab" aria-controls="VectorArt" aria-selected="false">Vector
                Art</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-4 py-2 rounded-pill" id="Patches-tab" data-toggle="tab" href="#Patches"
                role="tab" aria-controls="Patches" aria-selected="false">Patches</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="tab-content  px-5 mt-3" id="myTabContent">
        <!-- All Tab Content -->
        <div class="tab-pane fade show active" id="All" role="tabpanel" aria-labelledby="All-tab">
          <div class="row justify-content-center">
            <x-our-work-card image="{{ asset('mastersdigitizing-images/custom-embroidery-1.png') }}" title="Vector Art"
              description="Precision digitizing" />
            <x-our-work-card image="{{ asset('mastersdigitizing-images/vector-art-4.png') }}" title="Vector Art"
              description="Clean line work" />
            <x-our-work-card image="{{ asset('mastersdigitizing-images/embroidery-patches-work-2.png') }}"
              title="Custom Embroidery" description="Embroidery patches" />
            <x-our-work-card image="{{ asset('mastersdigitizing-images/embroidery-patches-work-3.png') }}"
              title="Custom Embroidery" description="Logo digitizing" />
            <x-our-work-card image="{{ asset('mastersdigitizing-images/custom-embroidery-work-1.png') }}"
              title="Vector Art" description="Custom embroidery" />
            <x-our-work-card image="{{ asset('mastersdigitizing-images/custom-embroidery-4.png') }}" title="Vector Art"
              description="Logo digitizing" />
            <x-our-work-card image="{{ asset('mastersdigitizing-images/custom-embroidery-5.png') }}" title="Vector Art"
              description="Custom design" />
          </div>
        </div>
        <!-- Custom Embroidery Tab Content -->
        <div class="tab-pane fade" id="CustomEmbrio" role="tabpanel" aria-labelledby="CustomEmbrio-tab">
          <div class="row justify-content-center">
            <x-our-work-card image="{{ asset('mastersdigitizing-images/embroidery-patches-work-2.png') }}"
              title="Custom Embroidery" description="Embroidery patches" />
            <x-our-work-card image="{{ asset('mastersdigitizing-images/embroidery-patches-work-3.png') }}"
              title="Custom Embroidery" description="Logo digitizing" />
            <x-our-work-card image="{{ asset('mastersdigitizing-images/custom-embroidery-work-1.png') }}"
              title="Vector Art" description="Custom embroidery" />
            <x-our-work-card image="{{ asset('mastersdigitizing-images/custom-embroidery-4.png') }}"
              title="Custom Embroidery" description="Logo digitizing" />
          </div>
        </div>

        <!-- Vector Art Tab Content -->
        <div class="tab-pane fade" id="VectorArt" role="tabpanel" aria-labelledby="VectorArt-tab">
          <div class="row justify-content-center">
            <x-our-work-card image="{{ asset('mastersdigitizing-images/custom-embroidery-1.png') }}" title="Vector Art"
              description="Precision digitizing" />
            <x-our-work-card image="{{ asset('mastersdigitizing-images/vector-art-4.png') }}" title="Vector Art"
              description="Clean line work" />
            <x-our-work-card image="{{ asset('mastersdigitizing-images/custom-embroidery-work-1.png') }}"
              title="Vector Art" description="Custom embroidery" />
            <x-our-work-card image="{{ asset('mastersdigitizing-images/custom-embroidery-4.png') }}" title="Vector Art"
              description="Logo digitizing" />
          </div>
        </div>

        <!-- Patches Tab Content -->
        <div class="tab-pane fade" id="Patches" role="tabpanel" aria-labelledby="Patches-tab">
          <div class="row justify-content-center">

            <x-our-work-card image="{{ asset('mastersdigitizing-images/vector-art-4.png') }}" title="Vector Art"
              description="Clean line work" />
            <x-our-work-card image="{{ asset('mastersdigitizing-images/embroidery-patches-work-2.png') }}"
              title="Custom Embroidery" description="Embroidery patches" />

            <x-our-work-card image="{{ asset('mastersdigitizing-images/custom-embroidery-4.png') }}" title="Vector Art"
              description="Logo digitizing" />
            <x-our-work-card image="{{ asset('mastersdigitizing-images/custom-embroidery-5.png') }}" title="Vector Art"
              description="Custom design" />
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container py-3">
    <div class="row justify-content-center">

      <div class="col-md-12">
        <h2 class="mb-5 pb-4 text-center" style="font-family: fantasy">OUR ONLINE SERVICES</h2>
      </div>

      <!-- Service 1 -->
      <x-service-card image="{{ asset('mastersdigitizing-images/digitization-icon.png') }}" title="Digitizing"
        description="We’re here to provide reliable embroidery digitizing service with prompt turnaround." />
      <x-service-card image="{{ asset('mastersdigitizing-images/vector-art-icon.png') }}" title="Vector Art"
        description="We’re here to provide reliable embroidery digitizing service with prompt turnaround." />
      <x-service-card image="{{ asset('mastersdigitizing-images/patches-icon.png') }} " title="Custom Patches"
        description="We’re here to provide reliable embroidery digitizing service with prompt turnaround." />
      <x-service-card image="{{ asset('mastersdigitizing-images/Shirt-digitizing-icon.png') }}"
        title="Shirt Digitizing"
        description="We’re here to provide reliable embroidery digitizing service with prompt turnaround." />
      <x-service-card image="{{ asset('mastersdigitizing-images/Logo-digitizing-icon.png') }} " title="Logo Digitizing"
        description="We’re here to provide reliable embroidery digitizing service with prompt turnaround." />
      <x-service-card image="{{ asset('mastersdigitizing-images/Cap-digitizing-icon.png') }} " title="Cap Digitizing"
        description="We’re here to provide reliable embroidery digitizing service with prompt turnaround." />

    </div>
  </div>


  <div class="ReasonSec py-5 mb-5">
    <div class="container">

      <!-- Heading -->
      <div class="text-center mb-3">
        <h2 class="text-uppercase mb-3" style="font-family: fantasy">HIGH-CLASS EMBROIDERY DIGITIZERS IN BUDGET
          RANGE</h2>
        <p class="text-muted" style="max-width: 800px; margin: auto;">
          At Embroidery Digitizing Direct, we understand that high quality should not come at a high price,
          even on a tight budget. We provide top-tier services at affordable prices, ensuring that small
          businesses and large corporates alike can avail of our services without spending a fortune.
        </p>
      </div>

      <div class="row align-items-center justify-content-center">

        <!-- Left Content -->
        <div class="col-md-7 mt-5">
          <img src="{{ asset('mastersdigitizing-images/shield.png') }}" alt="" class="img-fluid"
            width="100px">
          <h3 class="mb-4 text-dark font-weight-bold mt-4">Quality Products Without the Markup</h3>
          <ul class="mb-0 text-muted list-unstyled pr-3">
            <li><strong>On Latest Technology and Techniques:-</strong> <br> We use the latest digitizing
              software and
              processing hardware to
              ensure that every design is crafted with utmost precision and accuracy.<br><br>
            </li>
            <li><strong>Accountability:-</strong> <br> All our services are backed by a money-back guarantee or
              a complete
              refund.<br><br>
            </li>
            <li><strong>Clear Pricing:-</strong> <br> There are absolutely no hidden charges. You only pay for
              the digitizing
              services you
              receive, virtual handshakes included.<br><br>
            </li>
            <li><strong>Quality Assurance:-</strong> <br> Each digitized design undergoes a comprehensive
              quality check to meet
              our high
              standards and your expectations.<br><br>
          </ul>
        </div>
        <div class="col-md-5">
          <img src="{{ asset('mastersdigitizing-images/graph-v1.png') }}" alt="" width="100%" height="100%"
            class="img-fluid">

        </div>
      </div>
      <div class="row position-relative flex-column-reverse flex-md-row mt-5 pt-5">
        <div class="col-md-5">
          <img src="{{ asset('mastersdigitizing-images/graph-v2.png') }}" alt="" class="img-fluid"
            width="100%" height="100%">
        </div>
        <div class="col-md-7 pl-5">
          <img src="{{ asset('mastersdigitizing-images/cheap-dollar.png') }}" alt="" class="img-fluid"
            width="100px">
          <h3 class="mb-4 text-dark font-weight-bold mt-4">High Quality, Low Cost Embroidery Digitizing</h3>
          <ul class="mb-0 text-muted list-unstyled pr-3">
            <li><strong>Embroidery Digitizing Direct:-</strong> <br>
              <br> is your go-to source for services that
              perfectly blend
              affordability
              with the highest quality. Whether you need digitization for a one-time project or are
              looking for a
              long-term digitizing partner, our pricing is designed to offer you high-quality services
              without financial
              constraints.
              For more details about our services and how we can meet your embroidery needs within your
              budget, get in
              touch with us today! Let’s create something beautiful together, affordably.<br><br>
            </li>
          </ul>
          <p class="text-muted mb-0">
            <b></b>
          </p>
        </div>
      </div>
    </div>
  </div>


  {{-- FAQs Section --}}
  <div class="container-fluid Faqs_Section mb-5 px-md-5">
    <div class="row">

      <div class="col-md-12 mb-md-4">
        <h2 class="text-center" style="font-family: fantasy">Let’s Clear All Your Questions About Masters Digitizing</h2>
      </div>

      <!-- Left Column -->
      <div class="col-md-6">
        <div id="accordionLeft">

          <!-- FAQ 1 -->
          <div class="card">
            <div class="card-header" id="heading1">
              <h5 class="mb-0">
                <a class="btn btn-link w-100 text-left collapsed" data-toggle="collapse" data-target="#faq1"
                  aria-expanded="false">
                  What is embroidery digitizing?
                </a>
              </h5>
            </div>
            <div id="faq1" class="collapse" data-parent="#accordionLeft">
              <div class="card-body">
                Embroidery digitizing is the process of converting artwork or logos into a digital file readable by
                embroidery machines.
              </div>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="card">
            <div class="card-header" id="heading2">
              <h5 class="mb-0">
                <a class="btn btn-link w-100 text-left collapsed" data-toggle="collapse" data-target="#faq2"
                  aria-expanded="false">
                  Which file formats do you accept for digitizing?
                </a>
              </h5>
            </div>
            <div id="faq2" class="collapse" data-parent="#accordionLeft">
              <div class="card-body">
                We accept JPG, PNG, PDF, AI, EPS, PSD, and more. Upload any common format and we’ll take care of the rest.
              </div>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="card">
            <div class="card-header" id="heading3">
              <h5 class="mb-0">
                <a class="btn btn-link w-100 text-left collapsed" data-toggle="collapse" data-target="#faq3"
                  aria-expanded="false">
                  What embroidery machine formats do you provide?
                </a>
              </h5>
            </div>
            <div id="faq3" class="collapse" data-parent="#accordionLeft">
              <div class="card-body">
                We provide DST, PES, EXP, JEF, HUS, XXX, VP3, and many more formats based on your machine.
              </div>
            </div>
          </div>

          <!-- FAQ 4 -->
          <div class="card">
            <div class="card-header" id="heading4">
              <h5 class="mb-0">
                <a class="btn btn-link w-100 text-left collapsed" data-toggle="collapse" data-target="#faq4"
                  aria-expanded="false">
                  How long does it take to complete an order?
                </a>
              </h5>
            </div>
            <div id="faq4" class="collapse" data-parent="#accordionLeft">
              <div class="card-body">
                Our usual turnaround time is 6 to 12 hours. Rush service is available.
              </div>
            </div>
          </div>

          <!-- FAQ 5 -->
          <div class="card">
            <div class="card-header" id="heading5">
              <h5 class="mb-0">
                <a class="btn btn-link w-100 text-left collapsed" data-toggle="collapse" data-target="#faq5"
                  aria-expanded="false">
                  Do you offer 3D puff digitizing?
                </a>
              </h5>
            </div>
            <div id="faq5" class="collapse" data-parent="#accordionLeft">
              <div class="card-body">
                Yes, we specialize in 3D puff digitizing for caps and raised embroidery needs.
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Right Column -->
      <div class="col-md-6">
        <div id="accordionRight">

          <!-- FAQ 6 -->
          <div class="card">
            <div class="card-header" id="heading6">
              <h5 class="mb-0">
                <a class="btn btn-link w-100 text-left collapsed" data-toggle="collapse" data-target="#faq6"
                  aria-expanded="false">
                  Can I request a revision?
                </a>
              </h5>
            </div>
            <div id="faq6" class="collapse" data-parent="#accordionRight">
              <div class="card-body">
                Yes! We offer unlimited free revisions until you’re fully satisfied.
              </div>
            </div>
          </div>

          <!-- FAQ 7 -->
          <div class="card">
            <div class="card-header" id="heading7">
              <h5 class="mb-0">
                <a class="btn btn-link w-100 text-left collapsed" data-toggle="collapse" data-target="#faq7"
                  aria-expanded="false">
                  Do you provide vector art services?
                </a>
              </h5>
            </div>
            <div id="faq7" class="collapse" data-parent="#accordionRight">
              <div class="card-body">
                Yes, we offer clean and scalable vector conversions ideal for printing and branding.
              </div>
            </div>
          </div>

          <!-- FAQ 8 -->
          <div class="card">
            <div class="card-header" id="heading8">
              <h5 class="mb-0">
                <a class="btn btn-link w-100 text-left collapsed" data-toggle="collapse" data-target="#faq8"
                  aria-expanded="false">
                  How do I place an order?
                </a>
              </h5>
            </div>
            <div id="faq8" class="collapse" data-parent="#accordionRight">
              <div class="card-body">
                Just upload your design and complete the order form. We’ll start immediately.
              </div>
            </div>
          </div>

          <!-- FAQ 9 -->
          <div class="card">
            <div class="card-header" id="heading9">
              <h5 class="mb-0">
                <a class="btn btn-link w-100 text-left collapsed" data-toggle="collapse" data-target="#faq9"
                  aria-expanded="false">
                  What payment methods do you accept?
                </a>
              </h5>
            </div>
            <div id="faq9" class="collapse" data-parent="#accordionRight">
              <div class="card-body">
                We accept PayPal, credit cards, and other secure online payments.
              </div>
            </div>
          </div>

          <!-- FAQ 10 -->
          <div class="card">
            <div class="card-header" id="heading10">
              <h5 class="mb-0">
                <a class="btn btn-link w-100 text-left collapsed" data-toggle="collapse" data-target="#faq10"
                  aria-expanded="false">
                  Is there a limit to the number of orders?
                </a>
              </h5>
            </div>
            <div id="faq10" class="collapse" data-parent="#accordionRight">
              <div class="card-body">
                No limit! We handle one-off projects and bulk orders with the same dedication.
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>



  <div class="satisfied py-5" style="background-color: #165261">
    <div class="container mb-5">
      <div class="row">
        <div class="col-12 text-center">
          <h2 class="pt-3 pb-3 mb-5" style="font-family: fantasy; color: #fff;"> OUR SATISFIED REGULAR
            CLIENTS </h2>
        </div>

        <div class="col-12">
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">

              {{-- Slide 1 --}}
              <div class="swiper-slide">
                <x-review-card name="John Doe" designation="Marketing Manager"
                  review="This is a perfect platform for getting vectors digitize, very cost-effective services with an excellent outcome. Highly recommended." />
              </div>

              <div class="swiper-slide">
                <x-review-card name="Jane Smith" designation="Software Engineer"
                  review="This is a perfect platform for getting vectors digitize, very cost-effective services with an excellent outcome. Highly recommended." />
              </div>
              <div class="swiper-slide">
                <x-review-card name="Morgan" designation="CEO"
                  review="This is a perfect platform for getting vectors digitize, very cost-effective services with an excellent outcome. Highly recommended." />
              </div>
              <div class="swiper-slide">
                <x-review-card name="Albort" designation="Driver"
                  review="This is a perfect platform for getting vectors digitize, very cost-effective services with an excellent outcome. Highly recommended." />
              </div>
            </div>

          </div>
          <!-- Add Navigation Buttons -->
          <div class="swiper-button-next" style="right:-40px"></div>
          <div class="swiper-button-prev" style="left:-40px"></div>

        </div>
      </div>
    </div>
  </div>

  <div class="ClientCounter text-center py-5 bg-light">
    <div class="container">
      <div class="row">

        <div class="col-md-3 col-6 mb-4 mb-md-0">
          <div class="p-4 shadow-sm rounded bg-white h-100">
            <div class="icon mb-3 text-dark display-4"><i class="fa-solid fa-building"></i></div>
            <h3 class="font-weight-bold mb-1" style="color: #165261 ;">2989</h3>
            <h4 class="h6 text-muted">PROJECT COMPLETED</h4>
          </div>
        </div>

        <div class="col-md-3 col-6 mb-4 mb-md-0">
          <div class="p-4 shadow-sm rounded bg-white h-100">
            <div class="icon mb-3 text-dark display-4"><i class="fa-solid fa-users"></i></div>
            <h3 class="font-weight-bold mb-1" style="color: #165261 ;">2500</h3>
            <h4 class="h6 text-muted">HAPPY CLIENTS</h4>
          </div>
        </div>

        <div class="col-md-3 col-6 mb-4 mb-md-0">
          <div class="p-4 shadow-sm rounded bg-white h-100">
            <div class="icon mb-3 text-dark display-4"><i class="fa-solid fa-image"></i></div>
            <h3 class="font-weight-bold mb-1" style="color: #165261 ;">2989</h3>
            <h4 class="h6 text-muted">VECTOR DESIGN</h4>
          </div>
        </div>

        <div class="col-md-3 col-6 mb-4 mb-md-0">
          <div class="p-4 shadow-sm rounded bg-white h-100">
            <div class="icon mb-3 text-dark display-4"><i class="fa-solid fa-vector-square"></i></div>
            <h3 class="font-weight-bold mb-1" style="color: #165261 ;">2500</h3>
            <h4 class="h6 text-muted">DIGITIZING</h4>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection