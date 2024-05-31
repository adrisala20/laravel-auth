@extends('layouts.admin')
@section('title', $project->title)

@section('content')

<section>
    <h1>{{$projects->title}}</h1>
    <p>{{$project->content}}</p>
    <img src="{{$project->image}}" alt="{{$projects->title}}">
</section>
@endsection