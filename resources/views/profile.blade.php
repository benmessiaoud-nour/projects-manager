@include ('layouts.app')

@section('title' ,  'profile')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="text-center">
                <img src="{{asset('storage/' . auth()->user()->image)}}" alt="" width="82px" height="82px">

               

              <h3>
                    {{auth()->user()->name}}
              </h3>
            </div>
            <div class="card-body">
                <form action="/profile" method="POST" enctype="multipart/form-data">
              @csrf

                @method("PATCH")
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}">
                    @error('name')
                    <div class="text-danger">
                        <small>{{$message}}</small>
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{auth()->user()->email}}">
                    @error('email')
                    <div class="text-danger">
                        <small>{{$message}}</small>
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                    <div class="text-danger">
                        <small>{{$message}}</small>
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" ">
                    @error('password_confirmation')
                    <div class="text-danger">
                        <small>{{$message}}</small>
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="custom-file">
                        <input type="file" name="image" id="image" class="custom-file-input">
                        <label for="image" class="custom-file-label"  data-browse="Browse"></label>
                    </div>
                </div>
                <div class="form-group d-flex mt-5 flex-row-reverse">
                    <button type="submit" class="btn btn-primary ms-2">Save modifications</button>
                    <button type="submit" class="btn btn-light" form="logout">Logout</button>
                </div>
                </form>
                <form action="/logout" method="POST" id="logout">
                @csrf
            </form>
            </div>
        </div>
    </div>
</div>
 <script>
    document.getElementById('image').onchange =uploadOnChange;

    function uploadOnChange(){
        let filename = this.value;
        let lastIndex = filename.lastIndexOf("\\");

        if(lastIndex >= 0){
            filename = filename.substring(lastIndex + 1);
        }
        document.getElementById('image-label').innerHTML =filename;
</script> 
