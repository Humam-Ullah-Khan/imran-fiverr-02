@props(['image','title','description'])



<div class="col-md-4 mb-3">
    <div class="service-card shadow-sm p-4">
        <div class="service-icon">
            <img src="{{ $image }}" alt="Vector Art" class="service-icon-img">
            <h5 class=" m-0">{{ $title }}</h5>
        </div>
        <p class="text-muted mt-3 mb-0">{{ $description }}</p>
    </div>
</div>
