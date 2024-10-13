
@csrf

<div class="form-group">
    <label for="name">Project Title</label>
    <input type="text" name="name" id="name" class="form-control" value="{{$project->name}}">
    @error('name')
        <div class="text-danger">
            <small>{{$message}}</small>
        </div>
    @enderror

</div>

<div class="form-group">
    <label for="description">Project Description</label>
    <textarea type="text" name="description" id="description" class="form-control">{{$project->description}} </textarea>
    @error('description')
    <div class="text-danger">
        <small>{{$message}}</small>
    </div>
@enderror
</div>