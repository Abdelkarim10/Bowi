@extends('app-view.layouts')
@section('content')
{{-- <div class="card">
    <div class="card-header">Editing Privacy Policy</div>
    <div class="card-body">

        <form action="{{route('privacy-policies.update',$PrivacyPolicy->id)}}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            {{method_field('put')}} 
            <label>Title</label><br>
            <input type="text" name="title" id="title" value="{{$PrivacyPolicy->title}}" class="form-control"><br>

            <label>Content</label><br>
            <textarea name="text" id="text" class="form-control" style="height: 200px;resize:none">{{$PrivacyPolicy->text}}</textarea><br>
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
    <h1>Editing Privacy Policy</h1>
    <form action="{{ route('privacy-policies.update',$PrivacyPolicy->id)}}" method="post" >
        {!! csrf_field() !!}
        @method("PUT")
        <h5>Title</h5>
        <input type="text" class="CreatePostInput" name="title" id="title" value="{{$PrivacyPolicy->title}}">

        <h5>Text</h5>
        <textarea class="CreatePostInput" type="text" name="text" id="text" style="height: 200px;resize:none">{{$PrivacyPolicy->text}}</textarea>

        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
              {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>


        <input type="submit" class="CreatePostBtn" value="Edit">
    </form>
</div>
@endsection