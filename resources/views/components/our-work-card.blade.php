@props(['image', 'title', 'description'])

<div class="col-md-3">
    <div class="portfolio-item position-relative overflow-hidden m-3">
        <img src="{{ $image }}" alt="vector art work design" class="w-100"
            style="height: 250px; object-fit: contain;">
        <div class="portfolio-content d-flex align-items-center justify-content-center">
            <div class="text-center p-3">
                <h5 class="text-dark mb-1" style="font-size: 16px;font-weight: 600;">{{ $title }}</h5>
                <p class="text-dark mb-0 text-muted" style="font-size: 14px;">{{ $description }}</p>
            </div>
        </div>
    </div>
</div>
