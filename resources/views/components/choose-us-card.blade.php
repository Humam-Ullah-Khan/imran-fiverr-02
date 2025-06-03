@props(['title', 'description', 'image'])


<div class="col-md-3  d-flex flex-column justify-content-center align-items-center choose-us-card-container">
    <img src="{{ $image }}" alt="" height="130" width="130">
    <div class="mt-3  choose-us-card-content">
        <h3 class="text-center mx-auto"
            style="font-size:16px;font-weight:500;background: rgba(22, 82, 97, 0.6); color: white; padding: 2px 8px;
               border-radius: 0.25rem;width: fit-content;">
            {{ $title }}</h3>
        <p class="text-center w-75 mx-auto" style="font-size:13px">{{ $description }}</p>
    </div>
</div>
