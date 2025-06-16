@extends('sitelayout/master')

@section('content')
  <div class="HeaderContent">

    <div class="container">

      <div class="row">

        <div class="col">



          <div class="ContentInfo pt-4 pb-4">
            <!-- Samples Gallery Section -->
            <section class="samples-gallery-section py-5">
              <div class="container">
                <h2 class="section-title text-center mb-2" style="color: #111">
                  Excellence Samples Gallery
                </h2>
                <div class="text-center mb-4">
                  <img src="./sitelayout-images/star_line.png" alt="" width="150px" />
                </div>
                <div class="row row-cols-2 row-cols-md-4 g-4 justify-content-center">
                  <!-- Sample 1 -->
                  <div class="col-md-3">
                    <div class="sample-img-wrap position-relative overflow-hidden rounded">
                      <img src="{{ asset('sitelayout-images/sample-01.png') }}" alt="Puff Digitizing"
                        class="img-fluid w-100" />
                      <a href="/3d-puff-digitizing"
                        class="sample-img-overlay d-flex align-items-center justify-content-center">
                        <span class="fw-bold text-white fs-5">Puff Digitizing</span>
                      </a>
                      <div class="sample-title text-center fw-bold mt-2 d-md-none">
                        <a href="/3d-puff-digitizing">Puff Digitizing</a>
                      </div>
                    </div>
                  </div>
                  <!-- Sample 2 -->
                  <div class="col-md-3">
                    <div class="sample-img-wrap position-relative overflow-hidden rounded">
                      <img src="{{ asset('sitelayout-images/sample-02.png') }}" alt="Sleeve Digitizing"
                        class="img-fluid" />
                      <a href="/vector-art-digitizing"
                        class="sample-img-overlay d-flex align-items-center justify-content-center">
                        <span class="fw-bold text-white fs-5">Vector Art Digitizing</span>
                      </a>
                      <div class="sample-title text-center fw-bold mt-2 d-md-none">
                        <a href="/vector-art-digitizing">Vector Art Digitizing</a>
                      </div>
                    </div>
                  </div>
                  <!-- Sample 3 -->
                  <div class="col-md-3">
                    <div class="sample-img-wrap position-relative overflow-hidden rounded">
                      <img src="{{ asset('sitelayout-images/sample-03.png') }}" alt="Cap Digitizing"
                        class="img-fluid w-100" />
                      <a href="/logo-digitizing"
                        class="sample-img-overlay d-flex align-items-center justify-content-center">
                        <span class="fw-bold text-white fs-5">Cap Digitizing</span>
                      </a>
                      <div class="sample-title text-center fw-bold mt-2 d-md-none">
                        <a href="/logo-digitizing">Cap Digitizing</a>
                      </div>
                    </div>
                  </div>
                  <!-- Sample 4 -->
                  <div class="col-md-3">
                    <div class="sample-img-wrap position-relative overflow-hidden rounded">
                      <img src="{{ asset('sitelayout-images/sample-04.png') }}" alt="Patch Collection"
                        class="img-fluid w-100" />
                      <a href="/logo-digitizing"
                        class="sample-img-overlay d-flex align-items-center justify-content-center">
                        <span class="fw-bold text-white fs-5">Patch Collection</span>
                      </a>
                      <div class="sample-title text-center fw-bold mt-2 d-md-none">
                        <a href="/logo-digitizing">Patch Collection</a>
                      </div>
                    </div>
                  </div>
                  <!-- Sample 5 -->
                  <div class="col-md-3">
                    <div class="sample-img-wrap position-relative overflow-hidden rounded">
                      <img src="{{ asset('sitelayout-images/sample-05.png') }}" alt="Applique Digitizing"
                        class="img-fluid" />
                      <a href="/applique-digitizing"
                        class="sample-img-overlay d-flex align-items-center justify-content-center">
                        <span class="fw-bold text-white fs-5">Applique Digitizing</span>
                      </a>
                      <div class="sample-title text-center fw-bold mt-2 d-md-none">
                        <a href="/applique-digitizing">Applique Digitizing</a>
                      </div>
                    </div>
                  </div>
                  <!-- Sample 6 -->
                  <div class="col-md-3">
                    <div class="sample-img-wrap position-relative overflow-hidden rounded">
                      <img src="{{ asset('sitelayout-images/sample-06.png') }}" alt="Owl Jacket"
                        class="img-fluid w-100" />
                      <a href="/jacket-back-digitizing"
                        class="sample-img-overlay d-flex align-items-center justify-content-center">
                        <span class="fw-bold text-white fs-5">Jacket Back</span>
                      </a>
                      <div class="sample-title text-center fw-bold mt-2 d-md-none">
                        <a href="/jacket-back-digitizing">Jacket Back</a>
                      </div>
                    </div>
                  </div>
                  <!-- Sample 7 -->
                  <div class="col-md-3">
                    <div class="sample-img-wrap position-relative overflow-hidden rounded">
                      <img src="{{ asset('sitelayout-images/sample-07.png') }}" alt="Patch Set" class="img-fluid w-100" />
                      <a href="/embroidered-patches"
                        class="sample-img-overlay d-flex align-items-center justify-content-center">
                        <span class="fw-bold text-white fs-5">Patch Set</span>
                      </a>
                      <div class="sample-title text-center fw-bold mt-2 d-md-none">
                        <a href="/embroidered-patches">Patch Set</a>
                      </div>
                    </div>
                  </div>
                  <!-- Sample 8 -->
                  <div class="col-md-3">
                    <div class="sample-img-wrap position-relative overflow-hidden rounded">
                      <img src="{{ asset('sitelayout-images/sample-08.png') }}" alt="Hawks T-shirt"
                        class="img-fluid w-100" />
                      <a href="/jacket-back-digitizing"
                        class="sample-img-overlay d-flex align-items-center justify-content-center">
                        <span class="fw-bold text-white fs-5">Hawks T-shirt</span>
                      </a>
                      <div class="sample-title text-center fw-bold mt-2 d-md-none">
                        <a href="/jacket-back-digitizing">Hawks T-shirt</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

          </div>



        </div>



      </div>

    </div>

  </div>
@endsection
