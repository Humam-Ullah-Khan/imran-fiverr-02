@extends('sitelayout/master')

@section('content')
  <div class="HeaderContent">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="ContentInfo pt-4 pb-4">
            <section class="samples-gallery-section py-5">
              <div class="container">
                <h2 class="section-title text-center mb-2" style="color: #111">
                  Embroidery Digitizing Samples
                </h2>
                <div class="text-center mb-4">
                  <img src="{{ asset('sitelayout-images/star_line.png') }}" alt="" width="150px" />
                </div>

                <div class="nav-container mb-3">
                  <ul class="nav d-flex justify-content-center flex-wrap gap-2 nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="vector-artwork-tab" data-bs-toggle="pill"
                        data-bs-target="#vector-artwork" type="button" role="tab" aria-controls="vector-artwork"
                        aria-selected="true">Vector Artwork</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="t-shirt-embroidery-digitizing-tab" data-bs-toggle="pill"
                        data-bs-target="#t-shirt-embroidery-digitizing" type="button" role="tab"
                        aria-controls="t-shirt-embroidery-digitizing" aria-selected="false">T Shirt Embroidery
                        Digitizing</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="sleeve-digitizing-tab" data-bs-toggle="pill"
                        data-bs-target="#sleeve-digitizing" type="button" role="tab"
                        aria-controls="sleeve-digitizing" aria-selected="false">Sleeve Digitizing</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="puff-digitizing-tab" data-bs-toggle="pill"
                        data-bs-target="#puff-digitizing" type="button" role="tab" aria-controls="puff-digitizing"
                        aria-selected="false">Puff Digitizing</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="logo-digitizing-tab" data-bs-toggle="pill"
                        data-bs-target="#logo-digitizing" type="button" role="tab" aria-controls="logo-digitizing"
                        aria-selected="false">Logo Digitizing</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="cap-digitizing-tab" data-bs-toggle="pill"
                        data-bs-target="#cap-digitizing" type="button" role="tab" aria-controls="cap-digitizing"
                        aria-selected="false">Cap Digitizing</button>
                    </li>
                  </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="vector-artwork" role="tabpanel"
                    aria-labelledby="vector-artwork-tab" tabindex="0">
                    <div class="row">
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/vector-artwork-01.png') }}" alt="Vector Artwork Sample 1"
                            class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/vector-artwork-02.png') }}" alt="Vector Artwork Sample 2"
                            class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/vector-artwork-03.png') }}" alt="Vector Artwork Sample 3"
                            class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/vector-artwork-04.png') }}"
                            alt="Vector Artwork Sample 4" class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="t-shirt-embroidery-digitizing" role="tabpanel"
                    aria-labelledby="t-shirt-embroidery-digitizing-tab" tabindex="0">
                    <div class="row">
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/t-shirt-01.png') }}" alt="T Shirt Embroidery Sample 1"
                            class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/t-shirt-02.png') }}" alt="T Shirt Embroidery Sample 2"
                            class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/t-shirt-03.png') }}" alt="T Shirt Embroidery Sample 3"
                            class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/t-shirt-04.png') }}" alt="T Shirt Embroidery Sample 4"
                            class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="sleeve-digitizing" role="tabpanel"
                    aria-labelledby="sleeve-digitizing-tab" tabindex="0">
                    <div class="row">
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/Sleeve-Digitizing-01.png') }}"
                            alt="Sleeve Digitizing Sample 1" class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/Sleeve-Digitizing-02.png') }}"
                            alt="Sleeve Digitizing Sample 2" class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/Sleeve-Digitizing-03.png') }}"
                            alt="Sleeve Digitizing Sample 3" class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/Sleeve-Digitizing-04.png') }}"
                            alt="Sleeve Digitizing Sample 4" class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="puff-digitizing" role="tabpanel"
                    aria-labelledby="puff-digitizing-tab" tabindex="0">
                    <div class="row">
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/sample-01.png') }}" alt="Puff Digitizing Sample 1"
                            class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/sample-02.png') }}" alt="Puff Digitizing Sample 2"
                            class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/sample-03.png') }}" alt="Puff Digitizing Sample 3"
                            class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/sample-04.png') }}" alt="Puff Digitizing Sample 4"
                            class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="logo-digitizing" role="tabpanel"
                    aria-labelledby="logo-digitizing-tab" tabindex="0">
                    <div class="row">
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/logo-digitizing-01.png') }}"
                            alt="Logo Digitizing Sample 1" class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/logo-digitizing-02.png') }}"
                            alt="Logo Digitizing Sample 2" class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/logo-digitizing-03.png') }}"
                            alt="Logo Digitizing Sample 3" class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/logo-digitizing-04.png') }}"
                            alt="Logo Digitizing Sample 4" class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="cap-digitizing" role="tabpanel" aria-labelledby="cap-digitizing-tab"
                    tabindex="0">
                    <div class="row">
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/sample-05.png') }}" alt="Cap Digitizing Sample 1"
                            class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/sample-06.png') }}" alt="Cap Digitizing Sample 2"
                            class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/sample-07.png') }}" alt="Cap Digitizing Sample 3"
                            class="img-fluid rounded shadow-sm">
                        </div>
                      </div>
                      <div class="col-md-3 col-6 mb-4">
                        <div class="gallery-item">
                          <img src="{{ asset('sitelayout-images/sample-08.png') }}" alt="Cap Digitizing Sample 4"
                            class="img-fluid rounded shadow-sm">
                        </div>
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
