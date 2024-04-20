@extends('app-view.layouts')
@section('content')
{{-- <div class="card">
    <div class="card-header">Editing term</div>
    <div class="card-body">

        <form action="{{ route('term.update',['term'=>$term->id]) }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            {{method_field('put')}} 
            <label>Title</label><br>
            <input type="text" name="title" id="title" value="{{$term->title}}" class="form-control"><br>

            <label>Term</label><br>
            <textarea name="term" id="term" class="form-control" style="height: 200px;resize:none">{{$term->term}}</textarea><br>
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
    <h1>Editing term</h1>
    <form action="{{ route('term.update',['term'=>$term->id])}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PUT")
        <h5>Title</h5>
        <input type="text" class="CreatePostInput" name="title" id="title" value="{{$term->title}}">

        <h5>Text</h5>
        <textarea class="CreatePostInput" type="text" name="term" id="term" style="height: 200px;resize:none">{{$term->term}}</textarea>

        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
              {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>


        <input type="submit" class="CreatePostBtn" value="Edit">
    </form>
</div>

@endsection