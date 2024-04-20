@extends('app-view.layouts')
@section('content')
{{-- <div class="card">
    <div class="card-header">Editing news</div>
    <div class="card-body">

        <form action="{{ url('news',$newsrooms->id ) }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            @method("PUT")
            <label>Title</label><br>
            <input type="text" name="title" id="title" value="{{$newsrooms->title}}" class="form-control"><br>

            <label>Content</label><br>
            <input type="text" name="content" id="content" value="{{$newsrooms->content}}" class="form-control"><br>

            <label>Picture</label><br>
            Replace This photo ?
            <img
                 src="{{ env('APP_URL') . '/assets/news_pics/' .   $newsrooms->pic }}"
                 class="img-fluid rounded rounded-circle"
                 style="height:70px; width:75px;object-fit: cover"
                 alt="" />
                 <br><br>
            <input type="file" name="pic" id="pic" class="form-control"><br>

            <div style="color: red; margin-bottom: 0.5rem">
                @if($errors->any())
                  {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
                @endif
            </div>


            <input type="submit" value="Update" class="btn btn-success" style="background-color: #224C69 ;"><br>
        </form>

    </div>
</div> --}}

<div class="CreatePost">
    <h1>Edit News</h1>
    <form action="{{ url('news',$newsrooms->id ) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PUT")
        <h5>Title</h5>
        <input type="text" class="CreatePostInput" name="title" id="title" value="{{$newsrooms->title}}">

        <h5>Content</h5>
        <textarea required class="CreatePostInput" type="text" name="content" id="content" style="height: 200px;resize:none">{{$newsrooms->content}}</textarea>

        <h5>Picture (want to replace This photo ?)</h5>
        <div class="editPostImage">
            @if($newsrooms->pic != null)
                <img src="{{ env('url') . '/assets/news_pics/' .   $newsrooms->pic }}" alt="" />
            @else
                <img src="{{ asset('images/noimage.jpg/') }}" alt="">
            @endif
            <input type="file" name="pic" accept=".jpeg,.png,.jpg,.gif,.svg" id="pic">
        </div>

        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
              {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>


        <input type="submit" class="CreatePostBtn" value="Edit">
    </form>
</div>
<br>
<br>
<br>
@endsection
