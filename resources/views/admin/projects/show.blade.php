@extends('layouts.admin')
@section('title', $project->title)

@section('content')
<div class="d-flex justify-content-between align-items-center py-4">
        <h1>{{$project->title}}</h1>
        <div>
            <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn btn-secondary">Edit</a>
            <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button btn btn-danger"  data-item-title="{{ $project->title }}">
                 Delete Project</i>
                </button>
              </form>
        </div>
    </div>
    <div class="row">
        <div class="col-4 img-show">
            <img src="{{ asset('storage/' . $project->image)}}" alt="{{$project->title}}" class="img-fluid "> 
        </div>
        <div class="col-6">
            <p>{{$project->content}}</p>
        </div>
       
    </div>

</section>
@include('partials.modal-delete')
@endsection