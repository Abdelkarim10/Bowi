@extends('app-view.layouts')
@section('content')
{{-- <div class="card">
    <div class="card-header">Editing image Album</div>
    <div class="card-body">

        <form action="{{route('media-assets.update',$Image->id)}}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            {{method_field('put')}} 
            <img src="/images/media-assets/{{ $Image->image }}" style="width : 350px;margin-bottom:0.5rem" alt=""><br>
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
            <div style="color: green">
                {{ session()->get('message') }}
            </div>
            <input type="submit" value="Update" class="btn btn-success" style="background-color: #224C69 ;"><br>
        </form>

    </div>
</div> --}}

<div class="CreatePost">
    <h1>Editing image Album</h1>
    <form action="{{route('media-assets.update',$Image->id)}}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {{method_field('put')}} 
        <img src="/images/media-assets/{{ $Image->image }}" style="width : 350px;margin-bottom:0.5rem;border-radius: 1rem;" alt="">
        <label>Album :</label>
        <select name="album_id" class="CreatePostInput" aria-label="Default select example">
            <option selected disabled value={{null}}>{{__('Select the album')}} : </option>
            @foreach($Albums as $Album)
            <option style="text-transform: capitalize;" value={{$Album->id}}>{{__($Album->title)}}</option>
            @endforeach
        </select>
        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
              {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>
        <input type="submit" class="CreatePostBtn" value="Update">
    </form>
</div>
@endsection