<figure class="mt-3">
    <iframe
        src="{{ $modify($set['url'])->embedUrl() }}"
        width="100%"
        height="400"
        frameborder="0"
        allow="autoplay; fullscreen"
        allowfullscreen
    >
    </iframe>
    @include('documentation::cp.partials.description')
</figure>
