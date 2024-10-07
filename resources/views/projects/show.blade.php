@extends('layouts.app')

@section('content')
    
<header class="d-flex justify-content-between align-items-center my-5">
    <div class="h6 text-dark">
        <a href="/projects"> Projects / {{$project->name}}</a>
    </div>

    <div>
        <a href="/projects/{{$project->id}}/edit" class="btn btn-primary py-2" role="button">Edit Project</a>
    </div>
</header>


<section class="row text-left ">
<div class="row">
   
        <div class="card col-4 mb-4">
            <div class="card-body">
                <div class="status">
                    @switch($project->status)
                        @case(1)
                            <span class="text-success">Completed</span>
                            @break
                        @case(2)
                            <span class="text-danger">Deleted</span>
                            @break
                        @default
                            <span class="text-warning">In Progress</span>
                    @endswitch
                </div>
                <h5 class="font-weight-bold card-title">
                    <a href="/projects/{{ $project->id }}">{{ $project->name }}</a>
                </h5>
    
                <div class="card-text mt-4">
                    {{  $project->description}}
                </div>
                @include('projects.footer')
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <form></form>
                    <form action="{{ route('projects.update', $project->id) }} " method="POST">
                    @method('PATCH')
                    @csrf
                    <select name="status" class="custom-select" onchange="this.form.submit()">
                     <option value="0" {{$project->status === 0 ? 'selected' : ''}}>In Progress</option>
                     <option value="1" {{$project->status === 1 ? 'selected' : ''}}>Completed</option>
                      <option value="2" {{$project->status === 2 ? 'selected' : ''}}>Deleted</option>
                    </select>
                    </form>
                </div>
            </div>
        </div>
     
    
    
    <div class="col-lg-8">
    @foreach ($project->tasks as $task)
        <div class="card">
            <div class="{{$task->done ? 'checked muted' : ''}}"> 
                {{$task->body}}
            </div> 

            <div>
                <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" name="done"  class="form-control me-4" {{$task->done ? 'checked' : ''}} onchange="this.form.submit()">
                </form>
          
            </div>
        </div>

    @endforeach
    <div class="card">
        <form action="/projects/{{$project->id}}/tasks" method="POST">
            @csrf
        <input type="text" name="body" class="form-control p-2 me-2" placeholder="Add a new task">
        <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
    </div>
</div>
</section>

@endsection