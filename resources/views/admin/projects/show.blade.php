@extends('layouts.admin')
@section('title', $project->title)

@section('content')

<section>
    <h1>{{$project->title}}</h1>
    <p>{{$project->content}}</p>
    <div>
        <img src="{{$project->image}}" alt="{{$project->title}}" class="img-fluid">
    </div>
</section>
@endsection