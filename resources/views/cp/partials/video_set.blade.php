@switch($set['video_type'])
    @case('self')
        @include('documentation::cp.partials.video')
        @break
    @case('vimeo')
        @include('documentation::cp.partials.vimeo')
        @break
    @case('youtube')
        @include('documentation::cp.partials.youtube')
        @break
@endswitch
