@extends('app-view.layouts')
@section('content')

{{-- <div class="card" style="width: 90%">
    <div class="card-header">Creating a new Category</div>
    <div class="card-body">



        <form action="{{ url('categories') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <label for="name" >Name:</label><br>
            <input type="text" name="name" id="name" class="form-control"><br>
            <label>Image :</label><br>
            <input type="file" name="image" id="image" class="form-control"><br>

            <div style="color: red; margin-bottom: 0.5rem">
                @if($errors->any())
                  {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
                @endif
            </div>
            <div style="color: green">
                {{ session()->get('message') }}
            </div>
            <input type="submit" value="Save" class="btn btn-success" style="background-color: #224C69 ;"> <br>
        </form>

    </div>
</div> --}}

<div class="CreatePost">
    <h1>Creating a new Category</h1>
    <form action="{{ url('categories') }}" method="post" enctype="multipart/form-data" >
        {!! csrf_field() !!}
        <h5>Name</h5>
        <input required class="CreatePostInput" type="text" name="name" id="name">

        <h5>Image</h5>
        <input required class="CreatePostImage" type="file" accept=".jpeg,.png,.jpg,.gif,.svg" name="image" id="image">
        
        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
              {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>

        <input class="CreatePostBtn" type="submit" value="Save" >
    </form>
</div>
@endsection
