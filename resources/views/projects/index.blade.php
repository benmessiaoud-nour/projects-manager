@extends('layouts.app')

@section('content')

<header class="d-flex justify-content-between align-items-center my-5">
    <div class="h6 text-dark">
        <a href="/projects"> Projects</a>
    </div>

    <div>
        <a href="/projects/create" class="btn btn-primary py-2" role="button">New Project</a>
    </div>
</header>
    
<section>
<div class="row">
    
    @forelse ($projects as $project)
    <div class="card col-4 mb-4 me-4">
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
                <a href="/projects/{{ $project->id }}"> {{ $project->name }} </a>
           </h5>

            <div class="card-text mt-4">
                {{ Str::limit( $project->description , 150)}}
            </div>
            @include('projects.footer')
        </div>
    </div>

@empty
    
<div class="m-auto align-content-center text-center">
    <p>No projects found</p>
    <div class="mt-5">
        <a href="/projects/create" class="btn btn-primary btn-lg d-inline-flex align-items-center" role="button">Create Project</a>
    </div>
</div>

@endforelse
</div>

</section>


@endsection

