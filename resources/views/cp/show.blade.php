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
                            @include('documentation::cp.partials.video_set')
                            @break
                    @endswitch
                @endforeach

            </div>
       </article>
    </section>
@stop
