<figure class="mt-3">
    <iframe
        width="100%"
        height="400"
        src="{{ $modify($set['url'])->embedUrl() }}"
        frameborder="0"
        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
    >
    </iframe>
    @include('documentation::cp.partials.description')
</figure>
