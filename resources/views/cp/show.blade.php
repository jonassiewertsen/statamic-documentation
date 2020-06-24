@inject('format', 'Jonassiewertsen\Documentation\Helper\Format')
@inject('modify', 'Statamic\Modifiers\Modify')

@extends('statamic::layout')

@section('content')

    <h1 class="mt-2 mb-3 w-full text-4xl text-grey-70">{{ $documentation['title'] }}</h1>

    <section class="card px-6 pt-7 pb-6">
        <article class="bard-fieldtype">
            <div class="ProseMirror">

                @foreach ($documentation['content'] as $set)
                    @switch($set['type'])
                        @case ('text')
                            {!! $format->text($set['text']) !!}
                            @break
                        @case ('video')
                            @switch($set['video_type'])
                                @case('self')
                                    <figure class="mt-3">
                                        <video width="100%" height="400" controls>
                                            <source src="{{ $set['video'] }}">
                                            Your browser does not support the video tag.
                                        </video>
                                        @if ($set['description'])
                                            <figcaption class="text-sm text-grey-70 text-right">{{ $set['description'] }}</figcaption>
                                        @endif
                                    </figure>
                                    @break
                                @case('vimeo')
                                    <figure class="mt-3">
                                        <iframe src="{{ $modify($set['url'])->embedUrl() }}" width="100%" height="400" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                        @if ($set['description'])
                                            <figcaption class="mt-1 text-sm  text-grey-70 text-right">{{ $set['description'] }}</figcaption>
                                        @endif
                                    </figure>
                                    @break
                                @case('youtube')
                                    <figure class="mt-3">
                                        <iframe width="100%" height="400" src="{{ $modify($set['url'])->embedUrl() }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                                        @if ($set['description'])
                                            <figcaption class="mt-1 text-sm  text-grey-70 text-right">{{ $set['description'] }}</figcaption>
                                        @endif
                                    </figure>
                                    @break
                                @endswitch
                            @break
                        @endswitch
                @endforeach

            </div>
       </article>
    </section>
@stop
