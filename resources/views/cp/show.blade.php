@inject('modify', 'Statamic\Modifiers\Modify')

@extends('statamic::layout')

@section('content')

    <h1 class="mt-2 mb-3 w-full text-4xl text-grey-70">{{ $documentation->title }}</h1>

    <section class="card px-6 pt-7 pb-6">
        <article class="bard-fieldtype">
            <div class="ProseMirror">
                {!! $documentation->content !!}
            </div>
       </article>
    </section>
@stop
