@extends('layouts.app')

@section('content')
@if(config('isMobile') == false)
@yield("search_and_view", View::make('search_and_view', compact('view_type','val')))
@endif
<div class="container">
    <div class="white-bg">
    <h1 class="subtitle">Search results: {{count($results)}}</h1>
        @foreach($results as $result)
        <div class='white-bg search_full_results_block'>
            <h1 class="subtitle"><a href="/post/{{$result->id}}">{{$result->post_title}}</a></h1>
            <p>{{$result->post_content}}</p>
            <p><a href="/category/${el.category}">{{$result->category}}</a> | {{$result->date}}</p></div>
        @endforeach
    </div>    
</div>

@endsection