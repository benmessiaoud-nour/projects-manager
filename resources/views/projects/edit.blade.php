@extends('layouts.app')

@section('title' , 'Edit Project')

@section('content')

<div class="row justify-content-center text-right">
    <div class="col-10">
        <h3 class="text-center pt-5 font-weight-bold">
            Edit Project
        </h3>
<form action="/projects/{{$project->id}}" method="POST">
    @method("PATCH")

@include('projects.form')

<div class="form-group">
    <button type="submit" class="btn btn-primary">Edit</button>
    <a href="/projects" class="btn btn-light">Back</a>
</div>
</form>

    </div>
</div>

@endsection