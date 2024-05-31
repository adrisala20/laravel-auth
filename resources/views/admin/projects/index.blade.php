@extends('layouts.admin')
@section('title', 'Projects')

@section('content')
    <section class="container">
        <div class="d-flex justify-content-between py-4">
            <h1 class="text-uppercase">Projects</h1>
            <a href="{{route('admin.projects.create')}}" class="btn btn-primary">New project</a>
        </div>align-items-center
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col"> Created At</th>
                <th scope="col">Update At</th>
                <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($project as $project)
                <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->title}}</td>
                <td>{{$project->slug}}</td>
                <td>{{$project->create_at}}</td>
                <td>{{$project->update_at}}</td>
                <td>
                    <a href="{{route('admin.project.show', $project->slug)}}"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.project.edit', $project->slug)}}"><i class="fa-solid fa-pen"></i></a>
                    <i class="fa-solid fa-trash"></i>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
