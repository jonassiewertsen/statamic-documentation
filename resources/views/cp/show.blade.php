@inject('modify', 'Statamic\Modifiers\Modify')

@extends('statamic::layout')

@section('content')
    <section class="flex flex-wrap px-6 py-5 card">
        <h1 class="mt-2 mb-3 w-full">{{ $documentation->title }}</h1>

        <article>
            {!! $modify($documentation->content)
                ->markdown()
                ->replace(["<p>", "<p class='pb-2'>"])
                ->replace(["<a", "<a class='underline'"])
            !!}
       </article>
    </section>
@stop
