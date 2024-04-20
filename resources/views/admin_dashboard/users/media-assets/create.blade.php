@extends('app-view.layouts')
@section('content')

{{-- <div class="card" style="width: 90%">  
    <div class="card-header">Add new image to an album</div>
    <div class="card-body">



        <form action="{{ url('media-assets') }}" method="post" enctype="multipart/form-data" >
            {!! csrf_field() !!}
            <label>Image :</label><br>
            <input type="file" name="image" id="image" class="form-control"><br>
            <label>Album :</label><br>
            <select name="album_id" class="form-select selectInput" aria-label="Default select example">
                <option selected disabled value={{null}}>{{__('Select the album')}} : </option>
                @foreach($Albums as $Album)
                <option style="text-transform: capitalize;" value={{$Album->id}}>{{__($Album->title)}}</option>
                @endforeach
            </select><br>
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
    <h1>Add new image to an album</h1>
    <form action="{{ url('media-assets') }}" method="post" enctype="multipart/form-data" >
        {!! csrf_field() !!}

        <h5>Album :</h5>
        <select name="album_id" class="CreatePostInput" aria-label="Default select example">
            <option selected disabled value={{null}}>{{__('Select the album')}} : </option>
            @foreach($Albums as $Album)
            <option style="text-transform: capitalize;" value={{$Album->id}}>{{__($Album->title)}}</option>
            @endforeach
        </select>

        <h5>Picture</h5>
        <input class="CreatePostImage" type="file" accept=".jpeg,.png,.jpg,.gif,.svg" name="image" id="image">
        
        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
              {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>

        <input class="CreatePostBtn" type="submit" value="Save"> 
    </form>
</div>

@endsection