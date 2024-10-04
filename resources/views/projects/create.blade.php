@extends('layouts.app')

@section('title' , 'Create Project')

@section('content')

<div class="row justify-content-center text-right">
    <div class="col-10">
        <h3 class="text-center pt-5 font-weight-bold">
            New Project
        </h3>
<form action="/projects" method="POST">

@csrf

<div class="form-group">
    <label for="name">Project Title</label>
    <input type="text" name="name" id="name" class="form-control">
</div>

<div class="form-group">
    <label for="description">Project Description</label>
    <textarea type="text" name="description" id="description" class="form-control"> </textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Create</button>
    <a href="/projects" class="btn btn-light">Back</a>
</div>
</form>





    </div>
</div>

















@endsection