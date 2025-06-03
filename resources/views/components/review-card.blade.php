@props(['name', 'designation', 'review'])

<div class="card">
    <div class="card-body">
        <div class="position-absolute"
            style="top: 9px; right: 9px; font-size: 40px;">
            <i class="fa-solid fa-quote-right"
                style="color: rgba(128, 128, 128, 0.596);"></i>
        </div>
        <div class="d-flex align-items-center" style="gap: 20px;">
            <img src="{{ asset('front_assets/images/user-icon.png') }}"
                alt="" class="img-fluid rounded-circle" width="50px">
            <div>
                <h5 class="mb-0">{{ $name }}</h5>
                <p class="mb-0 text-muted">{{ $designation }}</p>
            </div>
        </div>
        <p class="stars mt-3 mb-2" style="color:goldenrod">&starf; &starf; &starf; &starf; &starf;</p>
        <p class="text-muted m-0" style="font-size: 16px;">
            {{ $review }}
        </p>
    </div>
</div>