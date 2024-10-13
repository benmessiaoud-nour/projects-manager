@extends('layouts.app')

@section('title' , 'Create Project')

@section('content')

<div class="row justify-content-center text-right">
    <div class="col-10">
        <h3 class="text-center pt-5 font-weight-bold">
            New Project
        </h3>
<form action="/projects" method="POST">

@include('projects.form' , ['project'=> new App\Models\project()])f

<div class="form-group">
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="/projects" class="btn btn-light">Back</a>
</div>
</form>





    </div>
</div>

















@endsection