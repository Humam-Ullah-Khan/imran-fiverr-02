<script async src="https://www.google.com/recaptcha/api.js"></script>

@extends('sitelayout/master')

@section('css')
  <!-- Booststrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Remix Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    integrity="sha512-XcIsjKMcuVe0Ucj/xgIXQnytNwBttJbNjltBV18IOnru2lDPe9KRRyvCXw6Y5H415vbBLRm8+q6fmLUU7DfO6Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
  <!-- Hero Section -->
  <section class="heroSection">
    <div class="container mb-5 mt-md-5 mt-0">
      <div class="row">
        <div class="col-md-7 p-md-5 p-3 py-5">
          <h1 class="hero-title">Premier Embroidery Digitizing Experts</h1>
          <h2 class="hero-subtitle my-3">
            Elevate Your Apparel with Precision
          </h2>
          <p class="hero-text">
            Digitizers Online is a leading embroidery digitizing service,
            turning your artwork into stunning stitches with ease. With over a
            decade of expertise, our skilled team delivers the fastest
            turnaround times and competitive pricing. We provide top-notch
            services across major cities like New York, Los Angeles, Chicago,
            Houston, and San Diego. Partner with Digitizers Online to make
            your designs stand out!
          </p>
          <a href="https://wa.me/12345678901" target="_blank"
            class="btn btn-primary cta-button me-md-3 mb-md-0 mb-3 px-4 py-1">
            +01 2345 678901
          </a>

          <a href="#" class="btn btn-outline-light py-1">Turn My Art Work to Stitches</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Us Section -->
  <section class="why-choose-us py-5">
    <div class="container">
      <h2 class="section-title text-center text-dark">
        Digitizers Embroidery Digitizing Service, Known for Excellence!
      </h2>

      <div class="text-center mb-5">
        <img src="{{ asset ('sitelayout-images/star_line.png')}}" alt="" width="150px" />
      </div>
      <div class="row">
        <div class="col-md-6">
          <h3 class="section-subtitle mb-3 fw-bold">
            Why Digitizers Online is the Best Choice for You
          </h3>
          <p class="section-text text-start mb-4">
            At Digitizers Online, our commitment to exceptional customer
            experience sets us apart in the embroidery digitizing industry. We
            guarantee 100% customer satisfaction, and our dedicated team works
            tirelessly to ensure you're delighted with the results—offering as
            many revisions as needed to achieve perfection.
          </p>
          <p class="section-text mb-4">
            With over 10 years of deep expertise, we deliver unmatched value
            through our meticulous knowledge and adaptability to modern needs.
            Our experience ensures that Digitizers Online remains a trusted
            leader in embroidery digitizing services across the USA.
          </p>
          <p class="section-text">
            Our team at Digitizers Online consists of highly trained and
            experienced professionals, ensuring top-quality online embroidery
            digitizing services. When you choose us, you can trust you're in
            capable hands, receiving exceptional value for your investment and
            confidence in us.
          </p>
        </div>

        <!-- Right Side  -->

        <div class="col-md-6 py-5">
          <div id="carouselExample" class="carousel slide">
            <div class="carousel-indicators bg-secondary rounded-pill">
              <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('sitelayout-images/shirt-01.jpg')}}" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="{{ asset('sitelayout-images/shirt-02.jpg')}}" class="d-block w-100" alt="..." />
              </div>
              <div class="carousel-item">
                <img src="{{ asset('sitelayout-images/shirt-03.jpg')}}" class="d-block w-100" alt="..." />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Custom Services Section -->
  <section class="custom-services py-5">
    <div class="container">
      <h2 class="section-title text-center text-dark">
        Custom Embroidery Digitizing in USA
      </h2>

      <div class="text-center mb-5">
        <img src="{{ asset ('sitelayout-images/star_line.png')}}" alt="" width="150px" />
      </div>

      <div class="row g-4">
        <!-- left Side  -->
        <div class="col-md-6">
          <img src="{{ asset('sitelayout-images/custom-services.jpg')}}" alt="" width="100%" />
        </div>

        <!-- Right Side -->
        <div class="col-md-6">
          <h3 class="section-subtitle mb-3 fw-bold">
            Digitizers Online Reigns Supreme in Customization
          </h3>
          <p class="section-text mb-4">
            Digitizers Online, based in the USA, offers unmatched
            personalization for all your embroidery needs. Whether you’re
            looking for 3D puff embroidery, machine embroidery, or custom
            glove embroidery, we provide endless customization options. Choose
            your preferred fabric, backing, shape, size, and more—your vision,
            your way.
          </p>
          <p class="section-text mb-4">
            We thrive on bringing your unique, out-of-the-box ideas to life.
            Our team at Digitizers Online transforms your creative concepts
            into stunning stitches, no matter how complex the design. We’re
            committed to delivering exceptional results with every project.
          </p>
          <p class="section-text">
            Searching for a creative yet affordable embroidery digitizing
            service? Look no further. Digitizers Online is a top provider of
            online embroidery and logo digitizing services, offering
            competitive pricing across New York, Washington, and beyond.
          </p>

          <a href="#" class="btn btn-primary py-1 px-4">Place Order Now</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Placeing Order Section -->
  <section class="placing-order py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="section-subtitle text-center text-dark">
            Place Your Order With Ease
          </h1>
        </div>
        <div class="text-center mb-5">
          <img src="{{ asset ('sitelayout-images/star_line.png')}}" alt="" width="150px" />
        </div>

        <div class="col-md-4">
          <div class="card w-100 border-0">
            <img src="{{ asset('sitelayout-images/order-details.png')}}" class="" alt="Card Image" width="250px" />
            <div class="card-body">
              <h5 class="card-title">
                <strong>1. Share Order Details</strong>
              </h5>
              <p class="card-text">
                Describe the design you want to turn into a digital format and
                specify its final size. Choose the stitch style and thread
                colors to finalize your order.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card w-100 border-0">
            <img src="{{ asset('sitelayout-images/order-payment.png')}}" class="" alt="Card Image" width="190px" />
            <div class="card-body">
              <h5 class="card-title">
                <strong>2. Pay For Your Order</strong>
              </h5>
              <p class="card-text">
                Describe the design you want to turn into a digital format and
                specify its final size. Choose the stitch style and thread
                colors to finalize your order.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card w-100 border-0">
            <img src="{{ asset('sitelayout-images/order-delivery.png')}}" class="" alt="Card Image" width="220px" />
            <div class="card-body">
              <h5 class="card-title">
                <strong>3. Get The Timely Delivery</strong>
              </h5>
              <p class="card-text">
                Describe the design you want to turn into a digital format and
                specify its final size. Choose the stitch style and thread
                colors to finalize your order.
              </p>
            </div>
          </div>
        </div>

        <div class="text-center">
          <a href="#" class="btn btn-primary py-1 px-5 my-4">Get Qoutes</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Service Section -->
  <section class="our-service-section py-5" style="background: #f7f7f7">
    <div class="container">
      <h1 class="section-subtitle text-center mb-2">Our Service</h1>
      <div class="text-center mb-5">
        <img src="{{ asset ('sitelayout-images/star_line.png')}}" alt="" width="150px" />
      </div>
      <div class="row g-4 justify-content-center">
        <!-- Service 1 -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm h-100 text-center p-3">
            <img src="{{ asset('sitelayout-images/service-01.png')}}" alt="Vector Art Conversion" class="img-fluid mb-3"
              style="max-height: 170px; object-fit: contain" />
            <p class="mb-4">
              We take your rough sketches or raster images and give your
              vector designs that are ready to be printed and converted into
              patches with zero hassles.
            </p>
            <a href="#" class="btn btn-primary fw-semibold" style="background: #4a90e2">Read More</a>
          </div>
        </div>
        <!-- Service 2 -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm h-100 text-center p-3">
            <img src="{{ asset('sitelayout-images/service-02.png')}}" alt="T Shirt Embroidery Digitizing" class="img-fluid mb-3"
              style="max-height: 170px; object-fit: contain" />
            <p class="mb-4">
              We have over ten years of experience in digitizing and can
              transform your artwork into a stitch format that embroidery
              machines and easily understand and execute.
            </p>
            <a href="#" class="btn btn-primary fw-semibold" style="background: #4a90e2">Read More</a>
          </div>
        </div>
        <!-- Service 3 -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm h-100 text-center p-3">
            <img src="{{ asset('sitelayout-images/service-03.png')}}" alt="Custom Embroidered Patches" class="img-fluid mb-3"
              style="max-height: 170px; object-fit: contain" />
            <p class="mb-4">
              Our high-speed machines and competent team can produce intricate
              designs. We create custom patches that are detailed, vibrant,
              and have meticulous finishing.
            </p>
            <a href="#" class="btn btn-primary fw-semibold" style="background: #4a90e2">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Samples Gallery Section -->
  <section class="samples-gallery-section py-5">
    <div class="container">
      <h2 class="section-title text-center mb-2" style="color: #111">
        Excellence Samples Gallery
      </h2>
      <div class="text-center mb-4">
        <img src="{{ asset ('sitelayout-images/star_line.png')}}" alt="" width="150px" />
      </div>
      <div class="row row-cols-2 row-cols-md-4 g-4 justify-content-center">
        <!-- Sample 1 -->
        <div class="col-md-3">
          <div class="sample-img-wrap position-relative overflow-hidden rounded">
            <img src="{{ asset('sitelayout-images/sample-01.png')}}" alt="Puff Digitizing" class="img-fluid w-100" />
            <div class="sample-img-overlay d-flex align-items-center justify-content-center">
              <span class="fw-bold text-white fs-5">Puff Digitizing</span>
            </div>
            <div class="sample-title text-center fw-bold mt-2 d-md-none">
              Puff Digitizing
            </div>
          </div>
        </div>
        <!-- Sample 2 -->
        <div class="col-md-3">
          <div class="sample-img-wrap position-relative overflow-hidden rounded">
            <img src="{{ asset('sitelayout-images/sample-02.png')}}" alt="Sleeve Digitizing" class="img-fluid" />
            <div class="sample-img-overlay d-flex align-items-center justify-content-center">
              <span class="fw-bold text-white fs-5">Sleeve Digitizing</span>
            </div>
            <div class="sample-title text-center fw-bold mt-2 d-md-none">
              Sleeve Digitizing
            </div>
          </div>
        </div>
        <!-- Sample 3 -->
        <div class="col-md-3">
          <div class="sample-img-wrap position-relative overflow-hidden rounded">
            <img src="{{ asset('sitelayout-images/sample-03.png')}}" alt="Cap Digitizing" class="img-fluid w-100" />
            <div class="sample-img-overlay d-flex align-items-center justify-content-center">
              <span class="fw-bold text-white fs-5">Cap Digitizing</span>
            </div>
            <div class="sample-title text-center fw-bold mt-2 d-md-none">
              Cap Digitizing
            </div>
          </div>
        </div>
        <!-- Sample 4 -->
        <div class="col-md-3">
          <div class="sample-img-wrap position-relative overflow-hidden rounded">
            <img src="{{ asset('sitelayout-images/sample-04.png')}}" alt="Patch Collection" class="img-fluid w-100" />
            <div class="sample-img-overlay d-flex align-items-center justify-content-center">
              <span class="fw-bold text-white fs-5">Patch Collection</span>
            </div>
            <div class="sample-title text-center fw-bold mt-2 d-md-none">
              Patch Collection
            </div>
          </div>
        </div>
        <!-- Sample 5 -->
        <div class="col-md-3">
          <div class="sample-img-wrap position-relative overflow-hidden rounded">
            <img src="{{ asset('sitelayout-images/sample-05.png')}}" alt="Applique Digitizing" class="img-fluid" />
            <div class="sample-img-overlay d-flex align-items-center justify-content-center">
              <span class="fw-bold text-white fs-5">Applique Digitizing</span>
            </div>
            <div class="sample-title text-center fw-bold mt-2 d-md-none">
              Applique Digitizing
            </div>
          </div>
        </div>
        <!-- Sample 6 -->
        <div class="col-md-3">
          <div class="sample-img-wrap position-relative overflow-hidden rounded">
            <img src="{{ asset('sitelayout-images/sample-06.png')}}" alt="Owl Jacket" class="img-fluid w-100" />
            <div class="sample-img-overlay d-flex align-items-center justify-content-center">
              <span class="fw-bold text-white fs-5">Owl Jacket</span>
            </div>
            <div class="sample-title text-center fw-bold mt-2 d-md-none">
              Owl Jacket
            </div>
          </div>
        </div>
        <!-- Sample 7 -->
        <div class="col-md-3">
          <div class="sample-img-wrap position-relative overflow-hidden rounded">
            <img src="{{ asset('sitelayout-images/sample-07.png')}}" alt="Patch Set" class="img-fluid w-100" />
            <div class="sample-img-overlay d-flex align-items-center justify-content-center">
              <span class="fw-bold text-white fs-5">Patch Set</span>
            </div>
            <div class="sample-title text-center fw-bold mt-2 d-md-none">
              Patch Set
            </div>
          </div>
        </div>
        <!-- Sample 8 -->
        <div class="col-md-3">
          <div class="sample-img-wrap position-relative overflow-hidden rounded">
            <img src="{{ asset('sitelayout-images/sample-08.png')}}" alt="Hawks T-shirt" class="img-fluid w-100" />
            <div class="sample-img-overlay d-flex align-items-center justify-content-center">
              <span class="fw-bold text-white fs-5">Hawks T-shirt</span>
            </div>
            <div class="sample-title text-center fw-bold mt-2 d-md-none">
              Hawks T-shirt
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="testimonials-section py-5" style="background: #f7f7f7">
    <div class="container">
      <h2 class="section-subtitle text-center mb-2" style="color: #111">
        Audience's Unbiased Comments about Embroidery Digitizing Service
      </h2>
      <div class="text-center mb-4">
        <img src="{{ asset ('sitelayout-images/star_line.png')}}" alt="" width="150px" />
      </div>
      <div class="row g-4 justify-content-center">
        <!-- Testimonial 1 -->
        <div class="col-md-4">
          <div class="testimonial-card bg-white shadow-sm p-4 rounded position-relative h-100">
            <h4 class="testimonial-title fw-semibold text-center mb-2" style="color: #222">
              “Outstanding Experience!”
            </h4>
            <div class="text-center mb-2" style="color: #ffd600; font-size: 1.3rem">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <p class="testimonial-text text-center mb-4" style="color: #222">
              I needed my logo digitized quickly and the team delivered beyond
              my expectations. Communication was smooth, turnaround was fast,
              and the final result was flawless. I will definitely use their
              services again!
            </p>
            <div class="testimonial-arrow"></div>
            <div class="d-flex flex-column align-items-center mt-4">
              <img src="{{ asset('sitelayout-images/review-01.webp')}}" alt="Robort" class="rounded-circle mb-2" width="70"
                height="70" style="object-fit: cover; border: 3px solid #4a90e2" />
              <span class="fw-semibold" style="color: #4a90e2">Robort</span>
            </div>
          </div>
        </div>
        <!-- Testimonial 2 -->
        <div class="col-md-4">
          <div class="testimonial-card bg-white shadow-sm p-4 rounded position-relative h-100">
            <h4 class="testimonial-title fw-semibold text-center mb-2" style="color: #222">
              “Creative and Affordable”
            </h4>
            <div class="text-center mb-2" style="color: #ffd600; font-size: 1.3rem">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <p class="testimonial-text text-center mb-4" style="color: #222">
              The creativity and attention to detail really impressed me. My
              applique design came out exactly as I hoped, and the price was
              very reasonable. Highly recommended for anyone looking for
              quality digitizing!
            </p>
            <div class="testimonial-arrow"></div>
            <div class="d-flex flex-column align-items-center mt-4">
              <img src="{{ asset('sitelayout-images/review-02.jpg')}}" alt="Kelly" class="rounded-circle mb-2" width="70"
                height="70" style="object-fit: cover; border: 3px solid #4a90e2" />
              <span class="fw-semibold" style="color: #4a90e2">Kelly</span>
            </div>
          </div>
        </div>
        <!-- Testimonial 3 -->
        <div class="col-md-4">
          <div class="testimonial-card bg-white shadow-sm p-4 rounded position-relative h-100">
            <h4 class="testimonial-title fw-semibold text-center mb-2" style="color: #222">
              “Impressed with the Results”
            </h4>
            <div class="text-center mb-2" style="color: #ffd600; font-size: 1.3rem">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <p class="testimonial-text text-center mb-4" style="color: #222">
              I wasn’t sure what to expect, but the embroidery digitizing was
              top-notch. The team was professional, responsive, and the
              finished product looked fantastic on my garments. Thank you for
              the great service!
            </p>
            <div class="testimonial-arrow"></div>
            <div class="d-flex flex-column align-items-center mt-4">
              <img src="{{ asset('sitelayout-images/review-03.jpg')}}" alt="Patrick" class="rounded-circle mb-2" width="70"
                height="70" style="object-fit: cover; border: 3px solid #4a90e2" />
              <span class="fw-semibold" style="color: #4a90e2">Zaka Zilla</span>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="#" class="btn btn-primary fw-semibold px-5">VIEW ALL REVIEWS</a>
      </div>
    </div>
  </section>

  <div class="container faq-section my-5">
    <h2 class="text-center faq-heading mb-5">
      Explore Our Embroidery Digitizing Solutions
    </h2>
    <div class="row">
      <div class="col-md-6">
        <div class="faq-item mb-4">
          <h4 class="faq-question">Where Are We Located?</h4>
          <p class="faq-answer">
            Our embroidery digitizing service operates from a base in the USA,
            extending its reach across the nation and beyond. We proudly serve
            a diverse clientele from various regions, ensuring accessibility
            no matter your location. Our dedicated support team is available
            24/7 to assist with your orders effortlessly.
          </p>
        </div>
        <div class="faq-item mb-4">
          <h4 class="faq-question">Can the Design Colors Be Adjusted?</h4>
          <p class="faq-answer">
            Yes, color changes are possible if requested before the digital
            draft is approved, at no extra cost. Once production starts,
            modifications may incur charges, depending on the production
            stage.
          </p>
        </div>
        <div class="faq-item mb-4">
          <h4 class="faq-question">What If I Need to Cancel?</h4>
          <p class="faq-answer">
            Our customer support is available round-the-clock to address any
            concerns. If cancellation is necessary, please review our
            cancellation policy. We encourage resolving issues directly to
            avoid cancellations, with refunds processed based on individual
            cases.
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="faq-item mb-4">
          <h4 class="faq-question">Why Choose Our Services?</h4>
          <p class="faq-answer">
            We stand out with our professional approach and customer-centric
            methods, delivering exceptional results. Committed to 100%
            satisfaction, we guarantee outstanding value for every client,
            making us a preferred choice in the industry.
          </p>
        </div>

        <div class="faq-item mb-4">
          <h4 class="faq-question">Do You Ship Internationally?</h4>
          <p class="faq-answer">
            Yes, we offer international shipping options through our
            partnership with top global logistics providers. While shipping
            costs may apply, we ensure timely delivery worldwide, bringing
            your customized patches right to your doorstep with ease.
          </p>
        </div>

        <div class="faq-item mb-4">
          <h4 class="faq-question">What Sets Your Services Apart?</h4>
          <p class="faq-answer">
            Every service is crafted by skilled professionals, ensuring
            expertise and precision. Our team’s dedication to excellence means
            every project is a masterpiece, tailored to your needs with
            perfection.
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <!-- Booststrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
@endsection
