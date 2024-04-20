@extends('app-view.layouts')
@section('content')

{{-- <div class="card" style="width: 90%">  
    <div class="card-header">Creating About-us</div>
    <div class="card-body">



        <form action="{{ url('about-us') }}" method="post" enctype="multipart/form-data" >
            {!! csrf_field() !!}
            <label>Title</label><br>
            <input type="text" name="title" id="title" class="form-control"><br>

            <label>Content</label><br>
            <input type="text" name="content" id="content" class="form-control"><br>

            <label>Picture</label><br>
            <input type="file" name="pic" id="pic" class="form-control"><br>
            
            <div style="color: red; margin-bottom: 0.5rem">
                @if($errors->any())
                  {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
                @endif
            </div>

            <input type="submit" value="Save" class="btn btn-success" style="background-color: #224C69 ;"> <br>
        </form>

    </div>
</div> --}}

<div class="CreatePost">
    <h1>Create About-us</h1>
    <form action="{{ url('about-us') }}" method="post" enctype="multipart/form-data" >
        {!! csrf_field() !!}
        <h5>Title</h5>
        <input required class="CreatePostInput" type="text" name="title" id="title">

        <h5>Content</h5>
        <textarea required class="CreatePostInput" type="text" name="content" id="content" style="height: 200px;resize:none"></textarea>

        <h5>Picture</h5>
        <input required class="CreatePostImage" type="file"  accept=".jpeg,.png,.jpg,.gif,.svg" name="pic" id="pic">
        
        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
              {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>

        <input class="CreatePostBtn" type="submit" value="Save" >
    </form>
</div>
@endsection